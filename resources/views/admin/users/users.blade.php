@extends("admin.layout")
@section("load-data")
<div class="col-md-12" style="font-size: 18px;">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ trans('message.success') }}
    </div>
    @endif
    @if (session('update'))
    <div class="alert alert-success" role="alert">
        {{ trans('message.update') }}
    </div>
    @endif
    @if (session('delete'))
    <div class="alert alert-success" role="alert">
        {{ trans('message.delete') }}
    </div>
    @endif
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 style="text-align: center;">Quản lí người dùng</h1>
        </div>
        <div style="margin-bottom:5px;">
            <a style="margin-left: 15px; margin-top: 15px;" href="{{ route('user.create') }}" class="btn btn-primary" style="font-size: 18px;">Thêm người dùng</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr style="text-align: center;">
                    <th>STT</th>
                    <th>Địa chỉ email</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th style="width:100px;"></th>
                </tr>
                @foreach ($data as $rows)
                <tr>
                    <td style="text-align: center; vertical-align: middle;">{{ $loop->index + 1 }}</td>
                    <td style="vertical-align: middle;">{{ $rows->email }}</td>
                    <td style="vertical-align: middle;">{{ $rows->name }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $rows->address }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $rows->phone }}</td>
                    <td style="text-align:center; vertical-align: middle;">
                        @if ($rows->status == 0)
                        <span class="text-danger">Admin</span>
                        @elseif ($rows->status == 1)
                        <span class="text-primary">Quản lý người dùng</span>
                        @elseif ($rows->status == 2)
                        <span class="text-primary">Quản lý danh mục và sản phẩm</span>
                        @elseif ($rows->status == 3)
                        <span class="text-primary">Quản Lý đơn hàng</span>
                        @endif
                    </td>
                    <td style="text-align:center;">
                        @if (session('user_status') == 0 || session('user_status') == 1)
                        <a href="{{ route('user.show', $rows->id) }}">Sửa</a>&nbsp;
                        <a href="{{ route('user.destroy', $rows->id) }}" onclick="return window.confirm('Are you sure?');">Xóa</a>
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
