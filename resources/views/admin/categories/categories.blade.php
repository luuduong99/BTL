@extends("admin.layout")
@section("load-data")
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Danh mục sản phẩm</h1></div>
        <div style="margin-bottom:5px;">
            <a style="margin-left: 15px; margin-top: 15px; font-size: 16px;" href="{{ route('categories.create') }}" class="btn btn-primary">Thêm danh mục sản phẩm</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="font-size: 16px;">
                <tr>
                    <th style="font-size: 16px;">STT</th>
                    <th style="font-size: 16px;">Tên danh mục</th>
                    <th style="font-size: 16px;">Tên gọi danh mục</th>
                    <th style="font-size: 16px;">Thuộc loại</th>
                    <th style="font-size: 16px;">Trạng thái</th>
                    <th style="font-size: 16px;"></th>
                </tr>
                @foreach ($data as $rows)
                    <tr class="stt">
                        <td style="text-align: center;"></td>
                        <td style="font-size: 16px;"> {{$rows->category_name}} </td>
                        <td style="font-size: 16px;"> {{$rows->category_alias}} </td>
                        <td style="width: 250px; font-size: 16px;">
                            @if ($rows->p_category_id == 0)
                                Danh mục cha
                            @else
                                @foreach ($data as $rowsSub)
                                    @if ($rowsSub->id == $rows->p_category_id)
                                        Danh mục con của {{ $rowsSub->category_name }}
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td style="text-align:center; font-size: 16px;">
                            @if ($rows->category_status == 1)
                                <span class="text-primary">Hiện</span>
                            @else
                                <span class="text-danger">Ẩn</span>
                            @endif
                        </td>
                        <td style="text-align:center; font-size: 16px;">
                            @if (session('user_status') == 0 || session('user_status') == 2)
                                <a style="font-size: 16px;" href="{{ route('categories.show', $rows->id) }}" class="label label-info">Sửa</a>&nbsp;
                                <a style="font-size: 16px;" href="{{ route('categories.destroy', $rows->id) }}" onclick="return window.confirm('Are you sure?');" class="label label-danger">Xóa</a>
                            @else
                                Chỉ xem
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <!-- ham render su dung de phan trang -->
            {{ $data->render() }}
        </div>
    </div>
</div>
@endsection
