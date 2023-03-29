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

    <main>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <!-- box search -->
                        <div class="panel panel-default" style="border: 1px solid black;">
                            <div class="panel-heading" style="background: #FFCC00;"> <h3>Tìm theo sản phẩm </h3></div>
                            <div class="panel-body">
                                <ul class="list-group" style="border:0px;">
                                    <?php foreach($category as $rows): ?>
                                        @if ($rows->p_category_id == 0)
                                            <li class="list-group-item" style="border:0px;">
                                                <input type="checkbox"> <a href="{{ route('front.cate', $rows->id) }}">{{ $rows->category_name }}</a>
                                            </li>
                                        @endif
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- end box search -->

                        <!-- box search -->
                            <div class="panel panel-default" style="margin-top:30px;border: 1px solid black;">
                                <div class="panel-heading" style="background: #FFCC00;"> <h3>Tìm theo mức giá </h3></div>
                                <div class="panel-body">
                                    <ul class="list-group" name="price" id="price" style="border:0px;">
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox" id="gia1" onclick="location.href='{{ Request::url() }}?fromPrice=0&toPrice=10000000';">
                                            <label for="gia1"  onclick="location.href='{{ Request::url() }}?fromPrice=0&toPrice=10000000';">Dưới 10 triệu</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox" id="gia2" onclick="location.href='{{ Request::url() }}?fromPrice=10000000&toPrice=20000000';">
                                            <label for="gia2" onclick="location.href='{{ Request::url() }}?fromPrice=10000000&toPrice=20000000';">Từ 10 triệu đến 20 triệu</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                                <input type="checkbox" id="gia3" onclick="location.href='{{ Request::url() }}?fromPrice=20000000&toPrice=40000000';">
                                            <label for="gia3">Từ 20 triệu đến 40 triệu</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                                <input type="checkbox" id="gia4" onclick="location.href='{{ Request::url() }}?fromPrice=40000000&toPrice=100000000';">
                                            <label for="gia4">Từ 40 triệu đến 100 triệu</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <!-- end search box -->
                        <div class="panel panel-default" style="margin-top:30px;border: 1px solid black;">
                            <div class="panel-heading" style="background: #FFCC00;"> <h3>Tìm theo mức giá </h3></div>
                            <div class="panel-body">
                                <ul class="list-group" style="border:0px;">
                                    <li class="list-group-item" style="border:0px;">Giá từ &nbsp;&nbsp;
                                    <input style="font-size: 16px;" type="number" min="0" value="0" id="fromPrice" class="form-control" />
                                    </li>
                                    <li class="list-group-item" style="border:0px;">Đến &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input style="font-size: 16px;" type="number" min="0" value="0" id="toPrice" class="form-control"/>
                                    </li>
                                    <li class="list-group-item" style="border:0px; text-align:center">
                                    <input style="font-size: 16px;" type="button" class="btn btn-warning" value="Tìm mức giá" onclick="location.href = '{{ Request::url() }}?fromPrice=' + document.getElementById('fromPrice').value + '&toPrice=' + document.getElementById('toPrice').value;" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--  -->
                        <!-- box search -->
                            <div class="panel panel-default" style="margin-top:30px;border: 1px solid black;">
                                <div class="panel-heading" style="background: #FFCC00;"> <h3>Tìm theo bộ nhớ trong </h3></div>
                                <div class="panel-body">
                                    <ul class="list-group" name="price" id="price" style="border:0px;">
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox" id="memory1" onclick="location.href='{{ Request::url() }}?memory=32';">
                                            <label for="memory1"  onclick="location.href='{{ Request::url() }}?memory=32';">Bộ nhớ trong 32GB</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="memory2" onclick="location.href='{{ Request::url() }}?memory=64';">
                                            <label for="memory2" onclick="location.href='{{ Request::url() }}?memory=64';">Bộ nhớ trong 64GB</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                                <input type="checkbox" < id="memory3" onclick="location.href='{{ Request::url() }}?memory=128';">
                                            <label for="memory3"  onclick="location.href='{{ Request::url() }}?memory=128';">Bộ nhớ trong 128GB</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                                <input type="checkbox"  id="memory4" onclick="location.href='{{ Request::url() }}?memory=256';">
                                            <label for="memory4"  onclick="location.href='{{ Request::url() }}?memory=256';">Bộ nhớ trong 256GB</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <!-- end search box -->
                        <!-- box search -->
                            <div class="panel panel-default" style="margin-top:30px;border: 1px solid black;">
                                <div class="panel-heading" style="background: #FFCC00;"> <h3>Tìm kiếm theo Ram </h3></div>
                                <div class="panel-body">
                                    <ul class="list-group" name="price" id="price" style="border:0px;">
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="ram1" onclick="location.href='{{ Request::url() }}?ram=1';">
                                            <label for="ram1"  onclick="location.href='{{ Request::url() }}?ram=1';">1GB RAM</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="ram2" onclick="location.href='{{ Request::url() }}?ram=2';">
                                            <label for="ram2" onclick="location.href='{{ Request::url() }}?ram=2';">2GB RAM</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="ram3" onclick="location.href='{{ Request::url() }}?ram=3';">
                                            <label for="ram3" onclick="location.href='{{ Request::url() }}?ram=3';" >3GB RAM</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox" id="ram4" onclick="location.href='{{ Request::url() }}?ram=4';">
                                            <label for="ram4" onclick="location.href='{{ Request::url() }}?ram=4';" >4GB RAM</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="ram6" onclick="location.href='{{ Request::url() }}?ram=6';">
                                            <label for="ram6" onclick="location.href='{{ Request::url() }}?ram=6';" >6GB RAM</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="ram8" onclick="location.href='{{ Request::url() }}?ram=8';">
                                            <label for="ram8" onclick="location.href='{{ Request::url() }}?ram=8';" >8GB RAM</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <!-- end search box -->
                        <!-- box search -->
                            <div class="panel panel-default" style="margin-top:30px;border: 1px solid black;">
                                <div class="panel-heading" style="background: #FFCC00;"> <h3>Khả năng chống nước </h3></div>
                                <div class="panel-body">
                                    <ul class="list-group" name="price" id="price" style="border:0px;">
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="chucnang1" onclick="location.href='{{ Request::url() }}?cn=1';">
                                            <label for="chucnang1"  onclick="location.href='{{ Request::url() }}?cn=1';">Chống nước</label>
                                        </li>
                                        <li class="list-group-item" style="border:0px;">
                                            <input type="checkbox"  id="chucnang2" onclick="location.href='{{ Request::url() }}?cn=0';">
                                            <label for="chucnang2" onclick="location.href='{{ Request::url() }}?cn=0';">Không chống nước</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <!-- end search box -->
                        <!-- end support -->
                        <div style="border: 1px solid black;" class="online_support block">
                            <div class="new_title">
                                <h3>Hỗ trợ trực tuyến</h3>
                            </div>
                            <div class="block-content">
                                <div class="sp_1">
                                    <i class="fas fa-phone-volume"></i>
                                    <p>Tư vấn bán hàng 1</p>
                                    <p>Mrs. Dung: (04) 3786 8904</p>
                                </div>
                                <div class="sp_1">
                                    <i class="fas fa-phone-volume"></i>
                                    <p>Tư vấn bán hàng 2</p>
                                    <p>Mr. Tuấn: (04) 3786 8904</p>
                                </div>
                                <div class="sp_1">
                                    <i class="fas fa-phone-volume"></i>
                                    <p>Email liên hệ</p>
                                    <p>support@mail.com</p>
                                </div>
                            </div>
                        </div>
                    <!-- end support online -->
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-9 col-xl-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script type="text/javascript" src="{{ asset('../../frontend/js/script.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#sort').on('change', function()
            {
                var url = $(this).val();
                if (url)
                {
                    window.location = url;
                }
                return false;
            });

        });
    </script>

    @yield('detailJs')


    <!-- <script type="text/javascript">
        $('#btn-comment').click(function(ev)
        {
            ev.preventDefault();
            let _commentURL = "";
            let content = $('#comment-content').val();
            console.log(content, _commentURL);
        });
    </script> -->
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
    </sc> -->
</body>
</html>
