<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function vnpay_payment(Request $request){
    $data=$request->all();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost:8080/vnpay_php/vnpay_pay.php";
    $vnp_TmnCode = "QMGKWMV2";
    $vnp_HashSecret = "DTD0ZCRP86TNV82IH48GQ283X0VUAZVH";

    $vnp_TxnRef = 1000; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
    $vnp_OrderInfo = "Thanh toán hóa đơn";
    $vnp_OrderType = "Web Bag";
    $vnp_Amount = $data['total'] * 100;
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
    

    }

    public function vnpay_return(Request $request)
{
    $vnp_HashSecret = "DTD0ZCRP86TNV82IH48GQ283X0VUAZVH"; // Chuỗi bí mật
    $inputData = $request->all();
    $vnp_SecureHash = $inputData['vnp_SecureHash'];
    unset($inputData['vnp_SecureHash'], $inputData['vnp_SecureHashType']);

    ksort($inputData);
    $hashdata = urldecode(http_build_query($inputData));
    $calculatedHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

    if ($calculatedHash === $vnp_SecureHash) {
        if ($inputData['vnp_ResponseCode'] == '00') {
            // Cập nhật trạng thái đơn hàng
            $order = Order::find($inputData['vnp_TxnRef']);
            if ($order) {
                $order->status = 'completed';
                $order->save();
            }
            return redirect()->route('cart.order.confirmation')->with('success', 'Thanh toán thành công!');
        }
    }

    return redirect()->route('cart.index')->with('error', 'Thanh toán không thành công!');
}

}
