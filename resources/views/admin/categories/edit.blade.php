@extends('admin.layout')
@section('load-data')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Sửa danh mục sản phẩm</h1></div>
        <div class="panel-body">
            <form action="{{ route('categories.edit', $category_edit->id) }}" method="POST" enctype="multipart/form-data">
                <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                @csrf
                <div class="panel-body" style="font-size: 16px;">
                    <!-- Categories Name -->
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-2">Tên danh mục</div>
                        <div class="col-md-10">
                            <input type="text" name="category_name" value="{{  $category_edit->category_name }}" class="form-control" required>
                        </div>
                    </div>
                    <!-- end Categories Name -->
                    <!-- Categories Alias -->
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-2">Tên gọi danh mục</div>
                        <div class="col-md-10">
                            <input type="text" name="category_alias" value="{{ $category_edit->category_alias }}" class="form-control" required>
                        </div>
                    </div>
                    <!-- end Categories Alias -->
                    <!-- Categories Status-->
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-2">Trạng thái</div>
                        <div class="col-md-10">
                            <select name="category_status">
                                @if ($category_edit->category_status == 1)
                                    <option selected value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                @else
                                    <option value="1">Hiện</option>
                                    <option selected value="0">Ẩn</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <!-- end Categories Parent -->
                    <!-- Categories Parent-->
                    <div class="row" style="margin-top:10px; margin-bottom: 10px">
                        <div class="col-md-2">Loại danh muc</div>
                        <div class="col-md-10">
                            <select name="p_category_id">
                                <option value="0">Danh mục cha</option>
                                @foreach ($category as $rows)
                                    @if ($rows->p_category_id == 0)
                                        <option {{ $rows->id == $category_edit->p_category_id ? 'selected' : '' }}  value="{{ $rows->id }}">{{ $rows->category_name }}</option>
                                        @foreach ($category as $rowsSub)
                                            @if ($rowsSub->p_category_id != 0 && $rowsSub->p_category_id == $rows->id)
                                                <option {{ $rowsSub->id == $category_edit->p_category_id ? 'selected' : '' }} value="{{ $rowsSub->id }}">{{ '--'.$rowsSub->category_name }}</option>
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
                        <button class="btn btn-success" type="submit" style="font-size: 16px;">Sửa</button>
                        <button class="btn btn-success"  type="submit" style="font-size: 16px;"><a style="color: white; text-decoration: none;" href="{{ route('categories.index') }}">Quay lại</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
