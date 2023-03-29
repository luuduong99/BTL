@extends('frontend.account.layoutLogin')
@section('title', 'Đăng Kí')
@section('account')
<div class="container" style="margin-top:40px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel" style="border-radius: 45px; margin-bottom: 75px;">
				<div class="panel-body" style="margin: 20px;">
                    @if (session('thatbai'))
                        {{ session('thatbai') }}
                    @endif
					<form action="{{ route('front.register') }}" method="POST" enctype="multipart/form-data">
                            <h1 style="text-align: center;">Đăng Kí Tài Khoản</h1>
                            <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="customer_email">Email:</label>
                                    <input style="font-size: 16px;" type="email" class="form-control" name="customer_email">
                                    @error('customer_email')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="customer_acc">Tên Tài Khoản:</label>
                                    <input  style="font-size: 16px;"type="text" class="form-control" name="customer_acc" placeholder="Tên từ 6-200 kí tự" >
                                    @error('customer_acc')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customer_name">Tên:</label>
                                    <input style="font-size: 16px;" type="text" class="form-control" name="customer_name" placeholder="Tên từ 6-200 kí tự" >
                                    @error('customer_name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="customer_password">Mật Khẩu:</label>
                                    <input style="font-size: 16px;" type="password" class="form-control" name="customer_password">
                                    @error('customer_password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_comfirm">Nhập lại mật khẩu:</label>
                                    <input  style="font-size: 16px;" type="password" class="form-control" name="password_comfirm">
                                    @error('password_comfirm')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="customer_phone">Số Điện Thoại:</label>
                                    <input style="font-size: 16px;" type="text" class="form-control" name="customer_phone" id="customer_phone">
                                    @error('customer_phone')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="customer_address">Địa Chỉ:</label>
                                    <input style="font-size: 16px;" type="text" class="form-control" name="customer_address" id="customer_address">
                                    @error('customer_address')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="customer_gender">Giới Tính:</label>
                                    <select name="customer_gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customer_image">Hình Ảnh:</label>
                                    <input type="file" name="customer_image">
                                </div>
                                <button style="font-size: 16px;" class="btn btn-success" type="submit">Đăng Kí</button>
                                <button style="font-size: 16px;" class="btn btn-success"  type="submit"><a style="color: white; text-decoration: none;" href="{{ route('front.login') }}">Đăng Nhập</a></button>
                            </div>
                        </form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

