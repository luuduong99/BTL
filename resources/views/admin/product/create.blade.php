@extends('admin.layout')
@section('load-data')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 style="text-align: center;">Thêm mới sản phẩm</h1>
        </div>
        <div class="panel-body" style="font-size: 16px;">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                @csrf
                <!-- product_name -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Tên sản phẩm</div>
                    <div class="col-md-10">
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                </div>
                <!-- end product_name -->
                <!-- product_hot-->
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-2">Sản Phẩm Nổi Bật</div>
                    <div class="col-md-10">
                        <select name="product_hot">
                            <option value="1">Nổi Bật</option>
                            <option value="0">Bình Thường</option>
                        </select>
                    </div>
                </div>
                <!-- end product_hot -->
                <!-- product_color -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Màu</div>
                    <div class="col-md-10">
                        <input type="text" name="product_color" class="form-control" required>
                    </div>
                </div>
                <!-- end product_color -->
                <!-- product_price -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Giá Sản Phẩm</div>
                    <div class="col-md-10">
                        <input type="text" name="product_price" class="form-control" required>
                    </div>
                </div>
                <!-- end product_price -->
                <!-- product_discount -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">% Giảm Giá</div>
                    <div class="col-md-10">
                        <input type="text" name="product_discount" class="form-control" required>
                    </div>
                </div>
                <!-- end product_discount -->
                <!-- product_ram -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Số Lượng</div>
                    <div class="col-md-10">
                        <input type="text" name="product_quantity" class="form-control" required>
                    </div>
                </div>
                <!-- end product_ram -->
                <!-- product_ram -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Ram</div>
                    <div class="col-md-10">
                        <input type="text" name="product_ram" class="form-control" required>
                    </div>
                </div>
                <!-- end product_ram -->
                <!-- product_ram -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Bộ nhớ trong</div>
                    <div class="col-md-10">
                        <input type="text" name="product_memory" class="form-control" required>
                    </div>
                </div>
                <!-- end product_ram -->
                <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Chip</div>
                    <div class="col-md-10">
                        <input type="text" name="product_chip" class="form-control" required>
                    </div>
                </div> -->
                <!-- end product_memory -->
                <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Màn Hình</div>
                    <div class="col-md-10">
                        <input type="text" name="product_mh" class="form-control" required>
                    </div>
                </div> -->
                <!-- end product_memory -->
                <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Camera sau</div>
                    <div class="col-md-10">
                        <input type="text" name="product_cs" class="form-control" required>
                    </div>
                </div> -->
                <!-- end product_memory -->
                <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Camera trước</div>
                    <div class="col-md-10">
                        <input type="text" name="product_ct" class="form-control" required>
                    </div>
                </div> -->
                <!-- end product_memory -->
                <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Hệ điều hành</div>
                    <div class="col-md-10">
                        <input type="text" name="product_hdh" class="form-control" required>
                    </div>
                </div> -->
                <!-- end product_memory -->
                <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Pin</div>
                    <div class="col-md-10">
                        <input type="text" name="product_pin" class="form-control" required>
                    </div>
                </div> -->
                <!-- end product_memory -->
                <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Sim</div>
                    <div class="col-md-10">
                        <input type="text" name="product_sim" class="form-control" required>
                    </div>
                </div> -->
                <!-- end product_memory -->
                <!-- product_alias -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Tên gọi danh mục</div>
                    <div class="col-md-10">
                        <input type="text" name="product_alias" class="form-control" required>
                    </div>
                </div>
                <!-- end product_alias -->
                <!-- product_cn-->
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-2">Chức Năng</div>
                    <div class="col-md-10">
                        <select name="product_cn">
                            <option value="1">Chống Nước</option>
                            <option value="0">Không Chống Nước</option>
                        </select>
                    </div>
                </div>
                <!-- end product_cn -->
                <!-- product_status-->
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-2">Trạng thái</div>
                    <div class="col-md-10">
                        <select name="product_status">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>
                <!-- end Categories Status -->
                <!-- Categories Parent-->
                <div class="row" style="margin-top:10px; margin-bottom: 10px">
                    <div class="col-md-2">Danh Mục</div>
                    <div class="col-md-10">
                        <select name="category_id">
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
                <!-- product_description -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Giới thiệu</div>
                    <div class="col-md-10">
                        <textarea name="product_description"></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("product_description");
                        </script>
                    </div>
                </div>
                <!-- end product_description -->
                <!-- product_content -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Chi tiết</div>
                    <div class="col-md-10">
                        <textarea name="product_content"></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("product_content");
                        </script>
                    </div>
                </div>
                <!-- end product_content -->
                <!-- product_image -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Ảnh</div>
                    <div class="col-md-10">
                        <input type="file" name="product_images">
                    </div>
                </div>
                <!-- end product_image -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <button style="font-size: 16px;" class="btn btn-success" type="submit">Thêm mới</button>
                        <button style="font-size: 16px;" class="btn btn-success" type="submit"><a style="color: white; text-decoration: none;" href="{{ route('products.index') }}">Quay lại</a></button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
