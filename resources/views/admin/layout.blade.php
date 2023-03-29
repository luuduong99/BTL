<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="{{ asset('../../admin/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('../../admin/ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <style type='text/css'>
        svg {
            width: 25px;
        }
        .hidden p {
            display: none;
        }
        .flex {
            margin-bottom: 30px;
        }
        .form-error {
            border: 2px solid #e74c3c;
        }

        table th {
            text-align: center;
        }

        table {
            counter-reset: rowNumber;
        }

        table .stt {
            counter-increment: rowNumber;
        }

        table .stt td:first-child::before {
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
        }
        /*  */
        .radius-10 {
            border-radius: 10px !important;
        }

        .border-info {
            border-left: 5px solid  #0dcaf0 !important;
        }
        .border-danger {
            border-left: 5px solid  #fd3550 !important;
        }
        .border-success {
            border-left: 5px solid  #15ca20 !important;
        }
        .border-warning {
            border-left: 5px solid  #ffc107 !important;
        }


        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, 0);
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .bg-gradient-scooter {
            background: #17ead9;
            background: -webkit-linear-gradient(
        45deg
        , #17ead9, #6078ea)!important;
            background: linear-gradient(
        45deg
        , #17ead9, #6078ea)!important;
        }
        .widgets-icons-2 {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ededed;
            font-size: 27px;
            border-radius: 10px;
        }
        .rounded-circle {
            border-radius: 50%!important;
        }
        .text-white {
            color: #fff!important;
        }
        .ms-auto {
            margin-left: auto!important;
        }
        .bg-gradient-bloody {
            background: #f54ea2;
            background: -webkit-linear-gradient(
        45deg
        , #f54ea2, #ff7676)!important;
            background: linear-gradient(
        45deg
        , #f54ea2, #ff7676)!important;
        }

        .bg-gradient-ohhappiness {
            background: #00b09b;
            background: -webkit-linear-gradient(
        45deg
        , #00b09b, #96c93d)!important;
            background: linear-gradient(
        45deg
        , #00b09b, #96c93d)!important;
        }

        .bg-gradient-blooker {
            background: #ffdf40;
            background: -webkit-linear-gradient(
        45deg
        , #ffdf40, #ff8359)!important;
            background: linear-gradient(
        45deg
        , #ffdf40, #ff8359)!important;
        }
        /*  */
    </style>
</head>
<body>
    <header style="background-color: #343a40;">
        <div class="container">
            <div class="row">
                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 logo" style="margin-top: 9px;">
                        <div class="logo-img">
                            <img style="width: 70px;" src="{{ asset('upload/products/logo-dien-thoai(32).jpg') }}" alt="">
                        </div>
                    </div>
                <div class="col-md-6" style="align-self: center; border-radius: 20px;">
                    <div class="search-header">
                        <input type="text" class="search-header" name="keyword" placeholder="Tìm Kiếm">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3" style="align-self: center; padding: 25px; font-size: 16px;">
                    <div class="icon-user">
                        <a href="">
                            <i class="fas fa-user"> Xin chào {{ session('user_name') }}</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="row">
            <div class="col-md-3">
                <div class="menu" style="height: 550px;">
                    <div class="menu-top">
                        <div class="menu-top-img">
                            <img src="{{ asset('admin/images/anh1.jpg') }}" alt="">
                        </div>
                        <div class="menu-top-content">
                            <div class="content-top">
                                @if (session('user_id'))
                                    <p style="margin-bottom: 0;font-size: 16px;">{{ session('user_name') }}</p>
                                @endif
                            </div>
                            <div class="content-bottom">
                                <span style="font-size: 10px;"><i style="color: green;" class="fas fa-circle"></i> online</span>
                            </div>
                        </div>
                    </div>
                    <h5>Các Danh Mục</h5>
                    <div class="menu-bottom">
                        <ul>
                            <li>
                                <a href="{{ route('categories.index') }}"><i class="fa fa-th"></i>Danh Mục Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{ route('products.index') }}"><i class="fa fa-th"></i>Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{ route('user.index') }}"><i class="fa fa-code"></i>Quản Lý User</a>
                            </li>
                            <li>
                                <a href="{{ route('orders.index') }}"><i class="fa fa-code"></i>Đơn Hàng</a>
                            </li>
                            <li>
                                <a href="{{ route('home.customer') }}"><i class="fa fa-code"></i>Khách Hàng</a>
                            </li>
                            <li>
                                <a href="{{ route('home.rating') }}"><i class="fa fa-code"></i>Đánh giá</a>
                            </li>
                            <li>
                                <a href="{{ route('home.comment') }}"><i class="fa fa-code"></i>Bình luận</a>
                            </li>
                            <li>
                                <a href="{{ route('get.logout') }}"><i class="fa fa-code"></i>Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="Dashboard">
                    <!--  -->
                    <div style="margin-right: 25px;">
                        @yield("load")
                    </div>
                    <!--  -->

                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <!-- <section class="content-header">
                            <h1>
                                Dashboard
                                <small style="font-size: 15px;display: inline-block;padding-left: 4px;font-weight: 300;">Control Panel</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><a href="#" ><i class="fas fa-tachometer-alt"></i> Home</a></li>
                                <li class="active"> Dashboard</li>
                            </ol>
                        </section> -->

                        <!-- Main content -->
                        <section class="content">
                            <div style="margin-right: 15px;">
                                @yield("load-data")
                            </div>
                        </section>
                        <!-- /.content -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="{{ asset('../../admin/js/script.js') }}"></script>
</body>
</html>
