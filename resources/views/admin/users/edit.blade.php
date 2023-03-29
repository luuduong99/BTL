@extends('admin.layout')
@section('load-data')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Sửa thông tin người dùng</h1></div>
        <div class="panel-body">
            <form action="{{ route('user.edit', $record->id) }}" method="POST" enctype="multipart/form-data">
                <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                @csrf
                <div class="panel-body"></div>
                    <div class="form-group">
                        <label for="mail_address">Email:</label>
                        <input type="email" class="form-control{{($errors->first('email') ? " form-error" : "")}}" name="email" value="<?php echo isset($record->email) ? $record-> email : '' ?>" @if(isset($record->email)) disabled @endif >
                        @error('email')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Tên người dùng:</label>
                        <input type="text" class="form-control{{($errors->first('name') ? " form-error" : "")}}" name="name" placeholder="Tên từ 6-200 kí tự" value="<?php echo isset($record->name) ? $record->name : '' ?>">
                        @error('name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu:</label>
                        <input type="password" class="form-control{{($errors->first('password') ? " form-error" : "")}}" name="password" @if(isset($record->email)) placeholder="Không đổi password thì không nhập thông tin vào ô này" @endif>
                        @error('password')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_comfirm">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control{{($errors->first('password_comfirm') ? " form-error" : "")}}" name="password_comfirm"  @if(isset($record->email)) placeholder="Không đổi password thì không nhập thông tin vào ô này" @endif>
                        @error('password_comfirm')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="text" class="form-control{{($errors->first('phone') ? " form-error" : "")}}" name="phone" id="phone" value="<?php echo isset($record->phone) ? $record->phone : '' ?>" >
                        @error('phone')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control{{($errors->first('address') ? " form-error" : "")}}" name="address" id="address" value="<?php echo isset($record->address) ? $record -> address : '' ?>" >
                        @error('address')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Chức Vụ:</label>
                        <select name="status">
                            <option value="">----Lựa chọn chức vụ----</option>
                            @if (session('user_status') == 0 && $record->status == 0)
                                <option selected value="0">Admin</option>
                                <option value="1">Quản lý người dùng</option>
                                <option value="2">Quản lý danh mục và sản phẩm</option>
                                <option value="3">Quản lý đơn hàng</option>
                            @else
                                <option value="1">Quản lý người dùng</option>
                                <option value="2">Quản lý danh mục và sản phẩm</option>
                                <option value="3">Quản lý đơn hàng</option>
                            @endif
                        </select>
                    </div>
                    <button class="btn btn-success" name="addUsers" type="submit">Sửa</button>
                    <button class="btn btn-success" name="Users" type="submit"><a style="color: white; text-decoration: none;" href="{{ route('user.index') }}">Quay lại</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
