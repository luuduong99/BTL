@extends('frontend.account.layoutLogin')
@section('title', 'Đổi mật khẩu')
@section('account')
<div class="container" style="margin-top:40px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
            @php
                $token = $_GET['token'];
                $email = $_GET['email'];
            @endphp
			<div class="panel" style="border-radius: 45px; margin-bottom: 75px;">
				<div class="panel-body" style="margin: 20px;">
                    @if (session('no'))
                        {{ session('no') }}
                    @endif
					<form action="{{ route('front.resetNewPass') }}" method="POST" enctype="multipart/form-data">
                        <h1 style="text-align: center;">Đổi Mật Khẩu</h1>
                        @if (session('error'))
                            <p style="color: red;">{{ session('error') }}</p>
                        @endif
						@csrf
                        <input type="hidden" class="form-control" name="token" value="{{ $token }}"  >
                        <input type="hidden" class="form-control" name="email" value="{{ $email }}"  >
                        <div class="form-group">
                            <label for="password_account">Mật Khẩu Mới:</label>
                            <input style="font-size: 16px;" type="password" class="form-control" name="password_account" required>
                        </div>
                        <div class="form-group">
                            <label for="password_account_comfirm">Nhập Lại Mật Khẩu:</label>
                            <input style="font-size: 16px;" type="password" class="form-control" name="password_account_comfirm" required>
                        </div>
                        <div class="form-group">
                            <button style="font-size: 16px;" class="btn btn-success" name="addUsers" type="submit">Đổi Mật Khẩu</button>
                        </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
