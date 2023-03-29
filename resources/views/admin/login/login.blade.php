<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('../../admin/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container" style="margin-top:40px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Đăng nhập</div>
				<div class="panel-body" style="font-size: 16px;">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
					<form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label for="email">Tên Tài Khoản:</label>
                            <input style="font-size: 16px;" type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu:</label>
                            <input style="font-size: 16px;" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <!-- <input type="checkbox" class="checkbox" name="" id="remember">
                            <label for="remember">Ghi nhớ đăng nhập</label> -->
                            <div>
                                <input style="font-size: 16px;" type="submit" value="Đăng Nhập" class="btn btn-primary">
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
