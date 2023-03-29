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
    <main style="font-size: 16px; margin: 0 auto;" >
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel-body" style="margin: 20px;">
                        <form action="{{ route('front.checkout') }}" method="POST">
                            <h1 style="text-align: center;">Thông tin khách hàng và ghi chú</h1>
                            @csrf
                            <div class="form-group">
                                <label for="customer_name">Tên Khách Hàng:</label>
                                <input style="font-size: 16px;" type="text" class="form-control" name="customer_name" value="{{ session('customer_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="customer_email" >Email</label>
                                <input style="font-size: 16px;" type="text" class="form-control" name="customer_email" value="{{ session('customer_email') }}">
                            </div>
                            <div class="form-group">
                                <label for="customer_address" >Địa Chỉ</label>
                                <input style="font-size: 16px;" type="text" class="form-control" name="customer_address"  value="{{ session('customer_address') }}">
                            </div>
                            <div class="form-group">
                                <label for="customer_phone" >Số Điện Thoại</label>
                                <input style="font-size: 16px;" type="text" class="form-control" name="customer_phone" value="{{ session('customer_phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="order_note">Ghi Chú</label>
                                <input style="font-size: 16px;" type="text" class="form-control" name="order_note" placeholder="Viết ghi chú nếu có">
                            </div>
                            <input type="hidden" class="form-control" name="total_price" placeholder="Input field" value="{{ $cart->total_price }}">
                            <input type="hidden" class="form-control" name="customer_id" placeholder="Input field" value="{{ session('customer_id') }}">
                            <button style="font-size: 16px;" class="btn btn-success">Đặt Hàng</button>
                        </form>
                    </div>
                </div>
                <h1 style="text-align: center;">Đơn hàng - Thanh toán khi nhận hàng</h1>
                <div class="">
                    <table class="table table-cart">
                        <thead style="border-color: inherit;background-color: #ddd;text-transform: uppercase;font-weight: 400; text-align: center;">
                            <tr>
                                <th style="width: 50px;">STT</th>
                                <th class="image">Ảnh sản phẩm</th>
                                <th class="name">Tên sản phẩm</th>
                                <th class="price">Giá san pham</th>
                                <th class="price">Giam gia</th>
                                <th class="price">Ram</th>
                                <th class="price">Memory</th>
                                <th class="quantity">Số lượng</th>
                                <th class="price">Thành tiền</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $n = 1; ?>
                            @foreach ($cart->items as $item)
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">{{$n}}</td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <img style="width: 150px;" src="{{ asset('upload/products/'.$item['product_images']) }}" title="{{ $item['product_name'] }}" alt="{{ $item['product_name'] }}" class="img-responsive" >
                                </td>
                                <td style="text-align: center; vertical-align: middle;"><a href="">{{ $item['product_name'] }}</a></td>
                                <td style="text-align: center; vertical-align: middle;"> {{ number_format($item['product_price']) }}₫ </td>
                                <td style="text-align: center; vertical-align: middle;"> {{ $item['product_discount'] }}%</td>
                                <td style="text-align: center; vertical-align: middle;"> {{ $item['product_ram'] }}GB</td>
                                <td style="text-align: center; vertical-align: middle;"> {{ $item['product_memory'] }}GB</td>
                                <td style="text-align: center; vertical-align: middle;">{{ $item['quantity'] }}</td>
                                <td style="text-align: center; vertical-align: middle;"><p><b>
                                    @if ($item["product_discount"] > 0)
                                    {{ number_format(($item["product_price"]-($item["product_price"]*$item["product_discount"])/100)*$item["quantity"]) }}₫
                                    @else
                                    {{ number_format($item["product_price"]*$item["quantity"]) }}
                                    @endif
                                </b></p></td>
                            </tr>
                            <?php $n++ ?>
                            @endforeach
                        </tbody>
                    </table>
                    <h2 style="text-align: right;">Tổng tiền thanh toán:<span>{{ number_format($cart->total_price) }}₫</span></h2>
                </div>
            </div>
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
