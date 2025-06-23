<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;


class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        Cart::instance('cart')->add($request->id,$request->name,$request->quantity,$request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
    
        // Kiểm tra số lượng tối đa, giả sử biến $product->max_quantity là số lượng tối đa
        if (isset($product->max_quantity) && $qty > $product->max_quantity) {
            return redirect()->back()->with('error', 'Không thể tăng thêm vì đã đạt số lượng tối đa.');
        }
    
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }
    

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
    
        // Kiểm tra nếu số lượng lớn hơn 1 thì mới giảm
        if ($qty >= 1) {
            Cart::instance('cart')->update($rowId, $qty);
        } else {
            // Có thể gửi thông báo nếu muốn thông báo người dùng không thể giảm hơn nữa
            return redirect()->back()->with('error', 'Số lượng không thể nhỏ hơn 1.');
        }
    
        return redirect()->back();
    }
    
    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove( $rowId );
        return redirect()->back();
    }

    public function empty_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request)
    {
        $coupon_code = $request->coupon_code;
        if (isset($coupon_code))
        {
            $coupon = Coupon::where('code', $coupon_code)
            ->where('expiry_date', '>=', Carbon::today())->first();
        
            
            if (!$coupon)
            {
                return redirect()->back()->with('error', 'Mã phiếu giảm giá không hợp lệ!');
            }
            else
            {
                Session::put('coupon', [
                    'code' => $coupon->code,
                    'type' => $coupon->type,
                    'value' => $coupon->value,
                    'cart_value' => $coupon->cart_value
                ]);
                $this->calculateDiscount();
                return redirect()->back()->with('success','Phiếu giảm giá đã được áp dụng');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Mã phiếu giảm giá không hợp lệ!');
        }
    }

    public function calculateDiscount()
    {
        $discount = 0;
    
        if (Session::has('coupon')) 
        {
            // Chuyển subtotal thành dạng số
            $subtotal = floatval(preg_replace('/[^0-9.]/', '', Cart::instance('cart')->subtotal()));
    
            // Kiểm tra loại giảm giá
            if (Session::get('coupon')['type'] == 'fixed') {
                $discount = floatval(Session::get('coupon')['value']); // Giá trị cố định
            } else {
                $couponValue = floatval(Session::get('coupon')['value'] ?? 0); // Lấy giá trị mặc định là 0
                $discount = ($subtotal * $couponValue) / 100; // Giảm giá theo phần trăm
            }
    
            // Tính giá trị sau giảm giá
            $subtotalAfterDiscount = $subtotal - $discount;
            $taxAfterDiscount = ($subtotalAfterDiscount * floatval(config('cart.tax'))) / 100;
            $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;
    
            // Lưu thông tin giảm giá vào session
            Session::put('discounts', [
                'discount' => number_format(floatval($discount), 2, '.', ''),
                'subtotal' => number_format(floatval($subtotalAfterDiscount), 2, '.', ''),
                'tax' => number_format(floatval($taxAfterDiscount), 2, '.', ''),
                'total' => number_format(floatval($totalAfterDiscount), 2, '.', ''),
            ]);
        }
    }
    
    public function remove_coupon_code()
    {
        Session::forget('coupon');
        Session::forget('discounts');
        return back()->with('success','Phiếu giảm giá đã bị xóa!');
    }

    public function checkout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        $address = Address::where('user_id' , Auth::user()->id)->where('isdefault', 1)->first();
        return view('checkout', compact('address'));
    }


    public function place_an_order(Request $request)
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->where('isdefault', true)->first();

        if (!$address) {
            $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:10',
                'zip' => 'required|numeric|digits:6',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required',
                'landmark' => 'required',
            ]);

            $address = new Address();
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = $request->landmark;
            $address->country = 'VIE'; 
            $address->user_id = $user_id;
            $address->isdefault = true;
            $address->save();
        }

        $this->setAmountforCheckout();

        $order = new Order();
        $order->user_id = $user_id;
        $order->subtotal = Session::get('checkout')['subtotal'];
        $order->discount = Session::get('checkout')['discount'];
        $order->tax = Session::get('checkout')['tax'];
        $order->total = Session::get('checkout')['total'];

        // Thông tin địa chỉ giao hàng
        $order->name = $address->name;
        $order->phone = $address->phone;
        $order->locality = $address->locality;
        $order->address = $address->address;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->country = $address->country;
        $order->landmark = $address->landmark;
        $order->zip = $address->zip;

        // Lưu đơn hàng
        $order->save();

        // Duyệt qua từng sản phẩm trong giỏ hàng và tạo OrderItem
        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id; // Gán Order ID từ đơn hàng đã tạo
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
        // Cập nhật số lượng sản phẩm sau khi đặt hàng
        $product = Product::find($item->id);
        if ($product) {
            // Trừ đi số lượng đã đặt
            $product->quantity -= $item->qty;
            $product->save();
        }
    
        $userEmail = Auth::user()->email;

        // Gửi email từ admin đến người dùng hiện tại
        Mail::send('emails.order', ['order' => $order], function ($message) use ($userEmail) {
            $message->from('lamnv.23ai@vku.udn.vn', 'Your Shop Name') // Mail admin mặc định
                    ->to($userEmail) // Gửi đến email người dùng hiện tại
                    ->subject('Order Confirmation');
        });


        // Cập nhật trạng thái đơn hàng
        $order->status = 'pending'; 
        $order->save();

        // Tạo giao dịch mới liên kết với đơn hàng
        if($request->mode == "card")
        {

        }  
        else if($request->mode == "paypal")
        {
            $data=$request->all();
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost:8080/vnpay_php/vnpay_pay.php";
            $vnp_TmnCode = "QMGKWMV2";
            $vnp_HashSecret = "DTD0ZCRP86TNV82IH48GQ283X0VUAZVH";
        
            $vnp_TxnRef = 1000; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
            $vnp_OrderInfo = "Thanh toán hóa đơn";
            $vnp_OrderType = "Web Bag";
            $vnp_Amount = $order->total * 100;
            $vnp_Locale = "VN";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
        
            );
            
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
            
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
                // vui lòng tham khảo thêm tại code demo
        
            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->status = "pending";
            $transaction->save();
        

        }    
        else if($request->mode == "cod")
        {
        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->order_id = $order->id;
        $transaction->mode = $request->mode;
        $transaction->status = "pending";
        $transaction->save();

        }

        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        Session::forget('coupon');
        Session::forget('discounts');
        Session::put('order_id', $order->id);
        return redirect()->route('cart.order.confirmation');

    }

    public function setAmountforCheckout()
    {
        if (!Cart::instance('cart')->content()->count() > 0) {
            Session::forget('checkout');
            return;
        }
        
        if (Session::has('coupon')) {
            Session::put('checkout', [
                'discount' => floatval(str_replace(',', '', Session::get('discounts')['discount'])),
                'subtotal' => floatval(str_replace(',', '', Session::get('discounts')['subtotal'])),
                'tax' => floatval(str_replace(',', '', Session::get('discounts')['tax'])),
                'total' => floatval(str_replace(',', '', Session::get('discounts')['total'])),
            ]);
        } else {
            Session::put('checkout', [
                'discount' => 0,
                'subtotal' => floatval(str_replace(',', '', Cart::instance('cart')->subtotal())),
                'tax' => floatval(str_replace(',', '', Cart::instance('cart')->tax())),
                'total' => floatval(str_replace(',', '', Cart::instance('cart')->total())),
            ]);
        }
        
    }

    public function order_confirmation()
    {
        if(Session::has('order_id'))
        {
         $order = Order::find(Session::get('order_id'));
         return view('order-confirmation', compact('order'));   
        }
        return redirect()->route('cart.index');
    } 



}
