@extends('frontend.account.layoutLogin')
@section('title', 'Quên Mật Khẩu')
@section('account')
    <div class="container" style="margin-top:40px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel" style="border-radius: 45px; margin-bottom: 75px;">
                    <div class="panel-body" style="margin: 20px;">
                        <form action="{{ route('front.recover') }}" method="POST">
                            <h1 style="text-align: center; margin-bottom: 5px;">Quên mật khẩu</h1>

                            @if (session('chuadk'))
                                <p style="color: red;">{{ session('chuadk') }}</p>
                            @endif
                            @if (session('suc'))
                                <p style="color: red;">{{ session('suc') }}</p>
                            @endif
                            @if (session('dung'))
                                <p style="color: red;">{{ session('dung') }}</p>
                            @endif
                            @if (session('sai'))
                                <p style="color: red;">{{ session('sai') }}</p>
                            @endif

                            @csrf
                            <div class="form-group">
                                <label for="email_account">Vui lòng nhập email tại đây:</label>
                                <input style="font-size: 16px;" type="text" class="form-control" name="email_account" placeholder="Nhập email của bạn" required>
                                <button style="font-size: 16px; margin-top: 5px;" type="submit" class="btn btn-primary">Xác nhận email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
