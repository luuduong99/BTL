@extends("admin.layout")
@section("load-data")
<div class="col-md-12" style="font-size: 18px;">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Quản lí khách hàng</h1></div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr style="text-align: center;">
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên</th>
                        <th>Tên tài khoản</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                        <th>Trạng Thái</th>
                        <th style="width:100px;"></th>
                    </tr>
                @foreach ($data as $rows)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $loop->index + 1 }}</td>
                        <td style="vertical-align: middle; text-align: center;">
                            @if(file_exists('upload/customers/'.$rows->customer_image) && $rows->customer_image != "")
                                <img src="{{ asset('upload/customers/'.$rows->customer_image) }}" style="width: 100px;">
                            @endif
                        </td>
                        <td style="vertical-align: middle;">{{ $rows->customer_name }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $rows->customer_acc }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $rows->customer_email }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $rows->customer_address }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $rows->customer_phone }}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            @if($rows->customer_gender == 1)
                                Nam
                            @else
                                Nữ
                            @endif
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            @if($rows->customer_status == 1)
                                Đã kích hoạt
                            @else
                                Chưa kích hoạt
                            @endif
                        </td>
                        <td style="text-align:center;">
                            @if (session('user_status') == 0 || session('user_status') == 1)
                                <a style="font-size: 16px;" href="{{ route('home.customer', $rows->id) }}" onclick="return window.confirm('Are you sure?');" class="label label-danger">Xóa</a>
                            @else
                                Chi Xem
                            @endif
                        </td>
                    </tr>
                    @endforeach
            </table>
            {{ $data->render() }}
        </div>
    </div>
</div>
@endsection
