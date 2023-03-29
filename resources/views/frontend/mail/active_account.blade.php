<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Tài Khoản</title>
</head>
<body>
    <div style="width: 600px; margin: 0 auto;">
        <div style="text-align: center;">
            <h2>Xin chao {{$customer->customer_name}}</h2>
            <p>Bạn đã đăng kí tài khoản tại hệ thống của chúng tôi</p>
            <p>Để tiếp tục sử dụng dịch vụ của chúng tôi vui lòng bấm vào nút kích hoạt bên dưới</p>
            <p>
                <a href="{{ route('front.actived', ['customer' => $customer->id, 'token' => $customer->customer_token]) }}" style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-size: both;" >Kich hoạt tài khoản</a>
            </p>
        </div>
    </div>
</body>
</html>
