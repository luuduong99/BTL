<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Điện Thoại</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('../../frontend/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('../../frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../../frontend/css/products.css') }}">
    <link rel="stylesheet" href="{{ asset('../../frontend/css/categories.css') }}">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />

</head>
<body>
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/613c98dc25797d7a89fe6db9/1ffaba7g7';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!-- Header -->
    <header>
        @include('frontend.header.header')
    </header>
    <!-- End Header -->

    <!-- Main -->
    <main style="font-size: 16px;">
        <div class="container" style="margin-top: 20px; margin-bottom: 20px;" >
            @if (!session('customer_id'))
                <p style="text-align: center;">Vui lòng đăng nhập để xem đơn hàng của bạn</p>
            @else
                <h1 style="text-align: center;" >Danh sách đơn hảng của bạn</h1>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                            <tr>
                                <th  style="width:80px; text-align: center; vertical-align: middle;">STT</th>
                                <th  style="width:100px; text-align: center; vertical-align: middle;">Ảnh sản phẩm</th>
                                <th style="text-align: center; vertical-align: middle;">Tên sản phẩm</th>
                                <th style="text-align: center; vertical-align: middle;">Trạng thái</th>
                                <th style="text-align: center; vertical-align: middle;">Phương thức thanh toán</th>
                                <th style="width:80px; text-align: center; vertical-align: middle;">Số lượng</th>
                                <th style="width:80px; text-align: center; vertical-align: middle;">Giá sản phẩm</th>
                                <th style="width:80px; text-align: center; vertical-align: middle;">Giảm giá</th>
                                <th style="width:80px; text-align: center; vertical-align: middle;">Ngày giao dịch</th>
                            </tr>
                            <?php $n = 1; ?>
                            @foreach ($detail as $rows)
                                @if ($rows->customer_id == session('customer_id'))
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">{{$n}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <img src="{{ asset('upload/products/'.$rows->product['product_images']) }}" title="{{ $rows->product_name }}" alt="{{ $rows->product_name }}" style="width: 100px;" class="card-img-top" >
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $rows->product_name }}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        @if ($rows->order['order_status'] == 1)

                                            <div class="">Đã giao hàng</div>
                                        @else
                                            <div class="">Chưa giao hàng</div>
                                        @endif
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        @if ($rows->order['order_pt'] == 0)
                                            <p>Thanh toan khi nhan hang</p>
                                        @else
                                            <p>Thanh toan online</p>
                                            <ul>
                                                <li>Ten Ngan Hang: {{ $rows->order['code_bank'] }}</li>
                                                <li>Ma Thanh Toan: {{ $rows->order['code_vnpay'] }}</li>
                                                <li>Ngay Giao Dich: {{ $rows->order['created_at'] }}</li>
                                            </ul>
                                        @endif
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $rows->quantity }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ number_format($rows->product_price) }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $rows->product['product_discount'] }}%</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $rows->created_at }}%</td>
                                </tr>
                                @endif
                                <?php $n++ ?>
                            @endforeach
                    </table>
                </div>
            @endif
        </div>
    </main>
    <!-- End Main -->
    <footer>
        @include('frontend.footer.footer')
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script type="text/javascript" src="{{ asset('../../frontend/js/script.js') }}"></script>

    <!-- <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if($(this).scrollTop()){
                    $('header').addClass('sticky');
                }else{
                    $('header').removeClass('sticky');
                }
            });
        });
    </script> -->
</body>
</html>
