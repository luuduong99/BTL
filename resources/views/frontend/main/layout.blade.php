<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Điện Thoại</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 item-left">
                    <div class="item-img1 img-thumbnail">
                        <a href="{{ route('front.detail', 2) }}"><img src="{{ asset('upload/products/1655104158.jpg') }}" alt="iPhone 11 64GB" title="iPhone 11 64GB"></a>
                    </div>
                    <div class="item-img1 img-thumbnail">
                        <a href="{{ route('front.detail', 1) }}"><img src="{{ asset('upload/products/1655693399.jpg') }}" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB"></a>
                    </div>
                    <div class="item-img1 img-thumbnail">
                        <a href="{{ route('front.detail', 4) }}"><img src="{{ asset('upload/products/1655693600.jpg') }}" alt="iPhone 12 Pro 512GB" title="iPhone 12 Pro 512GB"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 item-right" style="width: 67%; border:1px solid #ebebe0;">
                    <div class="img2" style="margin-top: 2px;">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img  style="height: 465px;" class="d-block w-100" src="{{ asset('upload/products/iphone-vs-samsung_800x450.jpg') }}">
                                </div>
                                <div class="carousel-item">
                                    <img  style="height: 465px;" class="d-block w-100" src="{{ asset('upload/products/samsung-vs-iphone-4.jpg') }}">
                                </div>
                                <div class="carousel-item">
                                    <img  style="height: 465px;" class="d-block w-100" src="{{ asset('upload/products/so-sanh-iphone-samsung.jpg') }}">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('product')
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
