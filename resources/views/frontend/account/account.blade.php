@extends('frontend.account.layoutLogin')
@section('title', 'Đăng nhập')
@section('account')
<div class="container" style="margin-top:40px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel" style="border-radius: 45px; margin-bottom: 75px;">
				<div class="panel-body" style="margin: 20px;">
                    @if (session('no'))
                        {{ session('no') }}
                    @endif
					<form method="POST" action="{{ route('front.checkLogin') }}">
                        <h1 style="text-align: center;">Đăng Nhập</h1>
                        @if (session('error'))
                            <p style="color: red;">{{ session('error') }}</p>
                        @endif
                        @if (session('erro'))
                            <p style="color: red;">{{ session('erro') }}</p>
                        @endif
						@csrf
                        <div class="form-group">
                            <label for="customer_acc">Tên Tài Khoản:</label>
                            <input style="font-size: 16px;" type="text" class="form-control" name="customer_acc" required>
                        </div>
                        <div class="form-group">
                            <label for="customer_password">Mật Khẩu:</label>
                            <input style="font-size: 16px;" type="password" class="form-control" name="customer_password" required>
                        </div>
                        <div class="form-group">
                            <!-- <input type="checkbox" class="checkbox" name="" id="remember">
                            <label for="remember">Ghi nhớ đăng nhập</label> -->
                            <div style="float: right;">
                                <input style="font-size: 16px;" type="submit" value="Đăng Nhập" class="btn btn-primary">
                                <button style="font-size: 16px;" class="btn btn-success"  type="submit"><a style="color: white; text-decoration: none;" href="{{ route('front.register') }}">Đăng Ki</a></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('front.forget') }}">Quên mật khẩu?</a>
                        </div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
