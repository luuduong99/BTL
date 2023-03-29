<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Orders;
use App\Helper\CartHelper;
use App\Models\Customers;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function formCheckout()
    {
        $category = Categories::all();
        return view('frontend.main.checkout', compact('category'));
    }

    public function checkout(Request $request, CartHelper $cart)
    {
        $customer_id = $request->input('customer_id');
        $total_price =  $request->input('total_price');
        if ($order = Orders::create([
            'customer_id' =>  $customer_id,
            'total_price' => $total_price,
            'order_note' => isset($request->order_note) ? $request->order_note : "",
            'order_status' => isset($request->order_status) ? $request->order_status : 0,
            'order_pt' => "0", // thanh toan binh thuong
            'vpn_response_code' => "",
            'code_bank' => "",
            'code_vnpay' => "",
        ])) {
            $order_id = $order->id;

            foreach ($cart->items as $product_id => $item) {
                $quantity = $item['quantity'];
                $product_name = $item['product_name'];
                $product_price = $item['product_price'];
                $product_quantity = $item['product_quantity'];
                $product_cl = $item['product_cl'];

                $order = OrderDetail::create([
                    'order_id' => $order_id,
                    'customer_id' => $customer_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'product_name' => $product_name,
                    'product_price' => $product_price
                ]);

                $product_edit = Products::find($product_id);
                $product_edit->product_cl = $product_cl - $quantity;
                $product_edit->save();

                $cus = Customers::find($customer_id);
                $order = Orders::find($order_id);
                $detail = OrderDetail::all();
                Mail::send('frontend.mail.mail_order', compact('cus', 'order', 'detail'), function($email) use ($cus)
                {
                    $email->subject('Shop Dien Thoai BTL cua Luu Dinh Duong - Xac Nhan Tai Khoan');
                    $email->to($cus->customer_email, $cus->customer_name);
                    $email->from($cus->customer_email);
                });
            }
            session(['cart' => '']);

            return redirect()->route('front.home');

        } else {

            return redirect()->route('front.fromCheckout');
        }
    }
    public function vnpay()
    {
        $category = Categories::all();
        return view('frontend.main.checkoutVNPAY', compact('category'));
    }

    public function vnpay_payment(Request $request, CartHelper $cart)
    {
        $data = $request->all();
        $code_card = rand(00,9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/frontend/cart/gio_hang";
        $vnp_TmnCode = "V963IG8O";//Mã website tại VNPAY
        $vnp_HashSecret = "JQDXAKVSIOLEDUKVZOJWMIDWSRCCESFY"; //Chuỗi bí mật

        $vnp_TxnRef = $code_card; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan don hang test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_price'];
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        //$vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
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
            "vnp_ReturnUrl" => route('front.vnpayReturn'),
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

    public function vnpayReturn(Request $request, CartHelper $cart)
    {
        $customer_id = session('customer_id');
        $total_price =  $request->vnp_Amount;
        if ($order = Orders::create([
            'customer_id' =>  $customer_id,
            'total_price' => $total_price,
            'order_note' => isset($request->order_note) ? $request->order_note : "",
            'order_status' => isset($request->order_status) ? $request->order_status : 0,
            'order_pt' => "1", // thanh toan online
            'vpn_response_code' => $request->vnp_ResponseCode ,
            'code_bank' => $request->vnp_BankCode ,
            'code_vnpay' => $request->vnp_TransactionNo,
        ])) {
            $order_id = $order->id;

            foreach ($cart->items as $product_id => $item) {
                $quantity = $item['quantity'];
                $product_name = $item['product_name'];
                $product_price = $item['product_price'];
                $product_quantity = $item['product_quantity'];

                $order = OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'customer_id' => $customer_id,
                    'quantity' => $quantity,
                    'product_name' => $product_name,
                    'product_price' => $product_price
                ]);

                $product_edit = Products::find($product_id);
                $product_edit->product_quantity = $product_quantity - $quantity;
                $product_edit->save();

                $cus = Customers::find($customer_id);
                $order = Orders::find($order_id);
                $detail = OrderDetail::all();
                Mail::send('frontend.mail.mail_order', compact('cus', 'order', 'detail'), function($email) use ($cus)
                {
                    $email->subject('Shop Dien Thoai BTL cua Luu Dinh Duong - Xac Nhan Tai Khoan');
                    $email->to($cus->customer_email, $cus->customer_name);
                    $email->from($cus->customer_email);
                });
            }
            session(['cart' => '']);

            return redirect()->route('front.home');

        } else {

            return redirect()->route('front.fromCheckout');
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo_payment(Request $request, CartHelper $cart)
    {
        $data = $request->all();
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $data['total_price'];
        $orderId = time() ."";
        $returnUrl = "http://localhost:8000/atm/result_atm.php";
        $notifyurl = "http://localhost:8000/atm/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";

        $requestId = time()."";
        $requestType = "payWithMoMoATM";
        $extraData = "";

        //before sign HMAC SHA256 signature
        $rawHashArr =  array(
                    'partnerCode' => $partnerCode,
                    'accessKey' => $accessKey,
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'bankCode' => $bankCode,
                    'returnUrl' => $returnUrl,
                    'notifyUrl' => $notifyurl,
                    'extraData' => $extraData,
                    'requestType' => $requestType
                    );
        // echo $serectkey;die;
        $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data =  array('partnerCode' => $partnerCode,
                    'accessKey' => $accessKey,
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'returnUrl' => $returnUrl,
                    'bankCode' => $bankCode,
                    'notifyUrl' => $notifyurl,
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result,true);  // decode json

        error_log( print_r( $jsonResult, true ) );
        header('Location: '.$jsonResult['payUrl']);
    }

    public function paymomo(Request $request, CartHelper $cart)
    {
        $data = $request->all();
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey =    'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $data['total_price'];
        $orderId = time() . "";
        $returnUrl = "http://localhost:8000/paymomo/result.php";
        $notifyurl = "http://localhost:8000/paymomo/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $extraData = "merchantName=MoMo Partner";

        $requestId = time() . "";
        $requestType = "captureMoMoWallet";
        //before sign HMAC SHA256 signature

        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there

        header('Location: ' . $jsonResult['payUrl']);
    }
}
