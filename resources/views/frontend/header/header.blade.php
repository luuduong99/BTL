<!-- header -->
    <header>
        <!-- Header-Top -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <span>
                            <i class="fas fa-phone-alt"></i>
                            09.8888.8888
                        </span>
                        <span style="margin-left: 15px;">
                            <a href="">
                                <i class="far fa-envelope"></i>
                                suport@gmail.com
                            </a>
                        </span>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align: right;">
                        @if (session('customer_id'))
                            <a style="font-size: 16px;" href="{{ route('front.profile', session('customer_id')) }}">Xin Chào {{ session('customer_acc') }}</a>
                            <span style="margin-left: 15px;">
                                <a href="{{ route('front.logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Đăng Xuất
                                </a>
                            </span>
                        @else
                            <span>
                                <a href="{{ route('front.login') }}">
                                    <i class="fas fa-user"></i>
                                    Đăng Nhập
                                </a>
                            </span>
                            <span style="margin-left: 15px;">
                                <a href="{{ route('front.register') }}">
                                    <i class=""></i>
                                    Đăng Kí
                                </a>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header-Top -->
        <!-- ################################################################ -->
        <!-- Header-Middle -->
        <div class="header-middle" style="padding: 5px 0 5px 0;">
            <div class="container">
                <div class="row" style="margin: 5px 0;">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 logo" style="text-align: center;">
                        <div class="logo-img">
                            <img style="width: 120px;" src="{{ asset('upload/products/logo-dien-thoai(32).jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 header-search" style="margin-bottom: 20px;">
                        <form action="{{ route('front.searchName') }}" method="GET">
                            {{ csrf_field() }}
                            <div style="margin-top:25px;" style="position:relative;">
                            <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key" class="input-control" name="key" autocomplete="off">
                            <button style="margin-top:5px;" type="submit"> <i class="fa fa-search" id="btnSearch"></i> </button>
                        </div>
                        </form>
                    </div>
                    <!-- <style type="text/css">
                        .smart-search{position: absolute; width: 80%; background: white; height: 350px;overflow: scroll; z-index: 1; display: none;}
                        .smart-search ul{padding: 0px; margin: 0px; list-style: none;}
                        .smart-search ul li{border-bottom: 1px solid #dddddd;}
                        .smart-search img{width: 50px; height: 50px; margin: 10px; margin-right: 5px;}
                        .smart-search ul li a{
                            color: black;font-size: 16px;
                            text-decoration: none;
                        }
                        .smart-search ul li a:hover{
                            color: #ff1a1a;
                        }
                    </style> -->
                    <!-- <script type="text/javascript">
                        //tinh nang nay phai dung ket hop voi jquery -> phai load thu vien jquery
                        //neu bai project tung ban chua co thi phai load jquery, kiem tra jquery co hoat dong hay khong bang cach them alert("ok") vao ben trong tag: $(document).ready(function(){ alert("ok"); });
                        $(document).ready(function(){
                            //-----------------
                            $(".input-control").keyup(function(){
                                var strKey = $("#key").val();
                                if(strKey.trim() == "")
                                    $(".smart-search").attr("style","display:none");
                                else{
                                    $(".smart-search").attr("style","display:block");
                                    //---
                                    //su dung ajax de lay du lieu
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: "",
                                        method: "POST",
                                        data: {strKey:strKey, _token:_token},
                                        success:function(data){
                                            $(".smart-search ul").empty();
                                            $(".smart-search ul").append(data);
                                        }
                                    });
                                }
                            });
                        });
                    </script> -->
                    <!--cart-->
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mini-cart" style="align-self: center;font-size: 16px;position: relative;">
                        <div class="wrapper-mini-cart"> <span class="icon"><i class="fa fa-shopping-cart" style="color: #00b300;"></i></span> <a style="text-decoration: none; color: black;" href="{{ route('front.cart') }}"> <span class="mini-cart-count"></span> Sản phẩm ({{ $cart->total_quantity }})<i class="fa fa-caret-down"></i></a>
                        <div class="content-mini-cart">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header-Middle -->
        <!-- ################################################################ -->
        <!-- Header-Bottom -->
            <nav class="container">
                <ul class="menu">
                    <li><a href="{{ route('front.home') }}">Trang Chủ</a></li>
                    <li>
                    <a href="">Sản Phẩm</a>
                        <ul class="sub_menu">
                            @foreach ($category as $rows)
                                @if ($rows->p_category_id == 0)
                                    <li><a href="{{ route('front.cate', $rows->id) }}">{{ $rows->category_name }}</a>
                                        <ul class="sub_menu">
                                        @foreach ($category as $rowsSub)
                                            @if ($rowsSub->p_category_id != 0 && $rowsSub->p_category_id == $rows->id)
                                                <li><a href="">{{ $rowsSub->category_name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('front.cart') }}">Giỏ Hàng</a>
                    </li>
                    <li>
                        <a href="{{ route('front.order') }}">Dơn Hàng</a>
                    </li>
                    <li>
                        <a href="#">Giới Thiệu</a>
                    </li>
                    <li>
                        <a href="#">Liên Hệ</a>
                    </li>
                </ul>
            </nav>
        <!-- End Header-Bottom -->
        <!-- <script>
            var show_menu = true;
            function clickFunction() {
                if(show_menu == true){
                    document.getElementById("menu-nav").style.display = "block";
                    show_menu = false;
                }else{
                    document.getElementById("menu-nav").style.display = "none";
                    show_menu = true;
                }
            }
        </script> -->
    </header>
    <!-- End Header -->
