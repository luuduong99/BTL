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
    <main>
        <div class="container">
            @if (session('sai'))
                {{ session('sai') }}
            @endif
            @if (session('dung'))
                {{ session('dung') }}
            @endif
            <div class="row">
                <div class="col-md-3">
                    <p style="font-size: 16px; cursor: pointer; color: blue;" >Đổi Mật Khẩu</p>
                    <form action="{{ route('front.updatePassword', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                        @csrf
                            <div class="form-group">
                                <label style="font-size: 16px;" for="customer_password">Mật khẩu cũ:</label>
                                <input style="font-size: 16px;" type="password" class="form-control" name="customer_password" value=""  >
                            </div>
                            <div class="form-group">
                                <label  style="font-size: 16px;" for="customer_password_new">Mật khẩu mới:</label>
                                <input style="font-size: 16px;" type="password" class="form-control" name="customer_password_new" value=""  >
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px;" for="customer_password_comfirm">Nhập lại mật khẩu:</label>
                                <input style="font-size: 16px;" type="password" class="form-control" name="customer_password_comfirm" value=""  >
                            </div>
                            <button style="font-size: 16px;" class="btn btn-success" name="addUsers" type="submit">Đổi Mật Khẩu</button>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div style="font-size: 16px;" class="panel-heading">Thông tin người dùng</div>
                        <div class="panel-body">
                            <form action="{{ route('front.updateProfile', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                                @csrf
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label style="font-size: 16px;" for="mail_address">Email:</label>
                                        <input style="font-size: 16px;" type="email" class="form-control" name="customer_email" value="{{ $customer->customer_email }}"  >
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 16px;" for="name">Name:</label>
                                        <input style="font-size: 16px;" type="text" class="form-control" name="customer_name" placeholder="Tên từ 6-200 kí tự" value="{{ $customer->customer_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 16px;" for="phone">Phone:</label>
                                        <input style="font-size: 16px;" type="text" class="form-control" name="customer_phone" id="customer_phone" value="{{ $customer->customer_phone }}" >
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 16px;" for="address">Address:</label>
                                        <input style="font-size: 16px;" type="text" class="form-control" name="customer_address" id="customer_address" value="{{ $customer->customer_address }}" >
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 16px;" for="customer_gender">Giới Tính:</label>
                                        <select style="font-size: 16px;" name="customer_gender">
                                            @if ($customer->customer_gender == 1)
                                                <option selected value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                            @else
                                                <option value="1">Nam</option>
                                                <option selected value="0">Nữ</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 16px;" for="customer_image">Hình Ảnh:</label>
                                        <input style="font-size: 16px;" type="file" name="customer_image">
                                        @if(file_exists('upload/customers/'.$customer->customer_image) && $customer->customer_image != "")
                                            <img src="{{ asset('upload/customers/'.$customer->customer_image) }}" style="width: 100px;">
                                        @endif
                                    </div>
                                    <button style="font-size: 16px;" class="btn btn-success" name="addUsers" type="submit">Sửa Thông Tin</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
