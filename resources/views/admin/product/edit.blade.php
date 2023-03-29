@extends('admin.layout')
@section('load-data')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Sửa chi tiết sản phẩm</h1></div>
        <div class="panel-body" style="font-size: 16px;">
            <form action="{{ route('products.edit', $product_edit->id) }}" method="POST" enctype="multipart/form-data">
                <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
                @csrf
            <!-- product_name -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Tên sản phẩm</div>
                    <div class="col-md-10">
                        <input type="text" name="product_name" value="{{ $product_edit->product_name }}" class="form-control">
                    </div>
                </div>
            <!-- end product_name -->
            <!-- product_hot-->
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-2">Trạng thái sản phẩm</div>
                    <div class="col-md-10">
                        <select name="product_hot">
                            @if ($product_edit->product_hot == 1)
                                    <option selected value="1">Nổi Bật</option>
                                    <option value="0">Bình Thường</option>
                                @else
                                    <option value="1">Nổi Bật</option>
                                    <option selected value="0">Bình Thường</option>
                                @endif
                        </select>
                    </div>
                </div>
            <!-- end product_hot -->
            <!-- product_color -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Màu</div>
                    <div class="col-md-10">
                        <input type="text" name="product_color" value="{{ $product_edit->product_color }}"  class="form-control" required>
                    </div>
                </div>
            <!-- end product_color -->
            <!-- product_price -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Giá Sản Phẩm</div>
                    <div class="col-md-10">
                        <input type="text" name="product_price" value="{{ $product_edit->product_price }}" class="form-control">
                    </div>
                </div>
            <!-- end product_price -->
            <!-- product_discount -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">% Giảm Giá</div>
                    <div class="col-md-10">
                        <input type="text" name="product_discount" value="{{ $product_edit->product_discount }}" class="form-control" required>
                    </div>
                </div>
            <!-- end product_discount -->
            <!-- product_ram -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Số Lượng</div>
                    <div class="col-md-10">
                        <input type="text" name="product_quantity" value="{{ $product_edit->product_quantity }}" class="form-control" required>
                    </div>
                </div>
            <!-- end product_ram -->
            <!-- product_ram -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Ram</div>
                    <div class="col-md-10">
                        <input type="text" name="product_ram" value="{{ $product_edit->product_ram }}" class="form-control" required>
                    </div>
                </div>
            <!-- end product_ram -->
            <!-- product_memory -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Bộ Nhớ Trong</div>
                    <div class="col-md-10">
                        <input type="text" name="product_memory" value="{{ $product_edit->product_memory }}" class="form-control" required>
                    </div>
                </div>
            <!-- end product_memory -->
            <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Chip</div>
                    <div class="col-md-10">
                        <input type="text" name="product_chip" value="{{ $product_edit->product_chip }}" class="form-control" required>
                    </div>
                </div> -->
            <!-- end product_memory -->
            <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Màn Hình</div>
                    <div class="col-md-10">
                        <input type="text" name="product_mh" value="{{ $product_edit->product_mh }}" class="form-control" required>
                    </div>
                </div> -->
            <!-- end product_memory -->
            <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Camera sau</div>
                    <div class="col-md-10">
                        <input type="text" name="product_cs" value="{{ $product_edit->product_cs }}" class="form-control" required>
                    </div>
                </div> -->
            <!-- end product_memory -->
            <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Camera trước</div>
                    <div class="col-md-10">
                        <input type="text" name="product_ct" value="{{ $product_edit->product_ct }}" class="form-control" required>
                    </div>
                </div> -->
            <!-- end product_memory -->
            <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Hệ điều hành</div>
                    <div class="col-md-10">
                        <input type="text" name="product_hdh" value="{{ $product_edit->product_hdh }}" class="form-control" required>
                    </div>
                </div> -->
            <!-- end product_memory -->
            <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Pin</div>
                    <div class="col-md-10">
                        <input type="text" name="product_pin" value="{{ $product_edit->product_pin }}" class="form-control" required>
                    </div>
                </div> -->
            <!-- end product_memory -->
            <!-- product_memory -->
                <!-- <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Sim</div>
                    <div class="col-md-10">
                        <input type="text" name="product_sim" value="{{ $product_edit->product_sim }}" class="form-control" required>
                    </div>
                </div> -->
            <!-- end product_memory -->
            <!-- product_alias -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Tên gọi danh mục</div>
                    <div class="col-md-10">
                        <input type="text" name="product_alias" value="{{ $product_edit->product_alias }}" class="form-control" required>
                    </div>
                </div>
            <!-- end product_alias -->
            <!-- product_cn-->
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-2">Chức năng</div>
                    <div class="col-md-10">
                        <select name="product_cn">
                            @if ($product_edit->product_cn == 1)
                                    <option selected value="1">Chống Nước</option>
                                    <option value="0">Không Chống Nước</option>
                                @else
                                    <option value="1">Chống Nước</option>
                                    <option selected value="0">Không Chống Nước</option>
                                @endif
                        </select>
                    </div>
                </div>
            <!-- end product_cn -->
            <!-- product_status-->
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-2">Trạng Thái</div>
                    <div class="col-md-10">
                        <select name="product_status">
                            @if ($product_edit->product_status == 1)
                                <option selected value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            @else
                                <option value="1">Hiện</option>
                                <option selected value="0">Ẩn</option>
                            @endif
                        </select>
                    </div>
                </div>
            <!-- end Categories Status -->
            <!-- Categories Parent-->
                <div class="row" style="margin-top:10px; margin-bottom: 10px">
                    <div class="col-md-2">Danh Mục</div>
                    <div class="col-md-10">
                        <select name="category_id">
                            <option>----Chọn Danh Mục Sản Phẩm----</option>
                            @foreach ($category as $rows)
                                @if ($rows->p_category_id == 0)
                                    <option {{ $rows->id == $product_edit->category_id ? 'selected' : '' }} value="{{ $rows->id }}">{{ $rows->category_name }}</option>
                                    @foreach ($category as $rowsSub)
                                        @if ($rowsSub->p_category_id != 0 && $rowsSub->p_category_id == $rows->id)
                                            <option {{ $rowsSub->id == $product_edit->category_id ? 'selected' : '' }} value="{{ $rowsSub->id }}">{{ '--'.$rowsSub->category_name }}</option>
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
                        <textarea name="product_description">{{ $product_edit->product_description }}</textarea>
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
                        <textarea name="product_content">{{ $product_edit->product_content }}</textarea>
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
                            @if(file_exists('upload/products/'.$product_edit->product_images) && $product_edit->product_images != "")
                                <img src="{{ asset('upload/products/'.$product_edit->product_images) }}" style="width: 100px;">
                            @endif
                    </div>
                </div>
            <!-- end product_image -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <button style="font-size: 16px;" class="btn btn-success" type="submit">Sửa</button>
                            <button style="font-size: 16px;" class="btn btn-success"  type="submit"><a style="color: white; text-decoration: none;" href="{{ route('products.index') }}">Quay Lại</a></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
