<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\UserAddress;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\Brand;
use App\Models\Slide;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('user.orders', compact('orders'));
    }

    public function order_details($order_id)
    {

        $order = Order::where('user_id', Auth::user()->id)->where('id', $order_id)->first();
        if ($order) 
        {
            $orderItems = OrderItem::where('order_id',$order->id)->orderBy('id')->paginate(12);   
            $transaction = Transaction::where('order_id',$order->id)->first();
            $products = Product::whereIn('id', $orderItems->pluck('product_id'))->get();
            return view('user.order-details', compact('order','orderItems', 'transaction' ,'products'));
        }else{
            return redirect()->route('login');
        }
        
    }

    public function order_cancel(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = 'canceled';
        $order->canceled_date = Carbon::now();
        $order->save(); 
        return back()->with('Trạng thái, Đơn hàng đã được hủy thành công');
    }
    //Trang dia chi
    public function address() {
        $address = UserAddress::where('user_id', Auth::user()->id)->first();
        return view('user.address', compact('address'));
    }
    
    public function address_update(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required',
        'phone' => 'required|digits:10',
        'city' => 'required',
        'locality' => 'required',
        'zip' => 'required',
        'address' => 'required',
        'state' => 'required',
        'country' => 'required',
        'landmark' => 'nullable|max:255',
    ]);

    // Lấy hoặc tạo mới địa chỉ cho người dùng
    $address = UserAddress::where('user_id', Auth::id())->first();

    if (!$address) {
        $address = new UserAddress();
        $address->user_id = Auth::id();
    }

    // Cập nhật các trường địa chỉ từ request
    $address->name = $request->name;
    $address->phone = $request->phone;
    $address->city = $request->city;
    $address->locality = $request->locality;
    $address->zip = $request->zip;
    $address->address = $request->address;
    $address->state = $request->state;
    $address->country = $request->country;
    $address->landmark = $request->landmark;

    // Lưu địa chỉ
    if ($address->save()) {

        // Cập nhật các đơn hàng của người dùng
        DB::table('orders')
            ->where('user_id', Auth::id())
            ->where('status', 'pending') // Cập nhật các đơn hàng đang chờ xử lý
            ->update([
                'name' => $request->name,           // Thay recipient_name thành name
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country
            ]);

        // Lấy thông tin đơn hàng đang chờ xử lý
        $order = DB::table('orders')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        if ($order) {
            // Chuyển hướng đến trang chi tiết đơn hàng
            return redirect()->route('user.order.details', ['order_id' => $order->id])
                ->with('status', 'Địa chỉ và đơn hàng đã được cập nhật thành công!');
        } else {
            return redirect()->route('user.orders')
                ->withErrors(['msg' => 'Không tìm thấy đơn hàng đang chờ xử lý!']);
        }
    } else {
        return redirect()->back()->withErrors(['msg' => 'Cập nhật địa chỉ thất bại!']);
    }
}
}
