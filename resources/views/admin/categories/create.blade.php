@extends('admin.layout')
@section('load-data')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Thêm mới danh mục sản phẩm</h1></div>
        <div class="panel-body">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                @csrf
                <div class="panel-body" style="font-size: 16px;">
                    <!-- Categories Name -->
                    <div class="row" style="margin-top:5px; font-size: 16px;">
                        <div class="col-md-2">Tên danh mục</div>
                        <div class="col-md-10">
                            <input type="text" name="category_name" class="form-control" required>
                        </div>
                    </div>
                    <!-- end Categories Name -->
                    <!-- Categories Alias -->
                    <div class="row" style="margin-top:5px; font-size: 16px;">
                        <div class="col-md-2">Tên gọi danh mục</div>
                        <div class="col-md-10">
                            <input type="text" name="category_alias" class="form-control" required>
                        </div>
                    </div>
                    <!-- end Categories Alias -->
                    <!-- Categories Status-->
                    <div class="row" style="margin-top:10px; font-size: 16px;">
                        <div class="col-md-2">Trạng thái</div>
                        <div class="col-md-10">
                            <select name="category_status">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <!-- end Categories Status -->
                    <!-- Categories Parent-->
                    <div class="row" style="margin-top:10px; margin-bottom: 10px">
                        <div class="col-md-2">Loại danh muc</div>
                        <div class="col-md-10">
                            <select name="p_category_id">
                                <option value="0">Main Categories</option>
                                @foreach ($category as $rows)
                                    @if ($rows->p_category_id == 0)
                                        <option value="{{ $rows->id }}">{{ $rows->category_name }}</option>
                                        @foreach ($category as $rowsSub)
                                            @if ($rowsSub->p_category_id != 0 && $rowsSub->p_category_id == $rows->id)
                                                <option value="{{ $rowsSub->id }}">{{ '--'.$rowsSub->category_name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- end Categories Parent -->
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <button class="btn btn-success" type="submit" style="font-size: 16px;">Thêm mới</button>
                        <button class="btn btn-success"  type="submit" style="font-size: 16px;"><a style="color: white; text-decoration: none;" href="{{ route('categories.index') }}">Quay lại</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
