@extends("admin.layout")
@section("load-data")
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-heading"><h1 style="text-align: center;">Danh mục sản phẩm</h1></div>
        </div>
        <div style="margin-bottom:5px;">
            <div class="row">
                <div class="col-md-4">
                    <a style="margin-left: 15px; margin-top: 15px;font-size: 16px;" href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
                </div>
                <div class="col-md-4" style="font-size: 16px;">
                    <form action="" method="GET">
                            {{ csrf_field() }}
                            <div style="margin-top:15px;" style="position:relative;">
                            <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key" class="input-control" name="key" autocomplete="off">
                            <button style="margin-top:5px;" type="submit"> <i class="fa fa-search" id="btnSearch"></i> </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="dropdown" style="float: right; margin: 15px 60px 0px 0; font-size: 16px;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin: 0px; font-size: 16px;">
                            @if (isset($_GET["cn"]) && $_GET["cn"] == 1)
                                Chống nước
                            @elseif (isset($_GET["cn"]) && $_GET["cn"] == 0)
                                Không chống nước
                            @else
                                Lọc sản phẩm
                            @endif
                        </button>
                        <ul class="dropdown-menu" style="font-size: 16px;">
                            <li style="cursor: pointer;"><a class="dropdown-item" onclick="location.href='{{ Request::url() }}?cn=1';" > Chống nước</a></li>
                            <li style="cursor: pointer;"><a class="dropdown-item" onclick="location.href='{{ Request::url() }}?cn=0';" >Không chống nước</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel-body" style="font-size: 16px;">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th style="width:100px;">Hình Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th style="width:50px;">Hot</th>
                    <th style="width:120px;">Giá Sản Phẩm</th>
                    <th style="width:120px;">% Giảm Giá</th>
                    <th style="width:70px;">Số Lượng</th>
                    <th style="width:70px;">Ram</th>
                    <th style="width:120px;">Bộ Nhớ Trong</th>
                    <th style="width:70px;">Màu</th>
                    <th style="width:100px;">Trạng Thái</th>
                    <th style="width:100px;">Chức Năng</th>
                    <th style="width:100px;">Danh Mục</th>
                    <th style="width:100px;"></th>
                </tr>
                <tr>
                @if (isset($_GET["cn"]))
                    @foreach ($searchCn as $rows)
                        <tr class="stt">
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if(file_exists('upload/products/'.$rows->product_images) && $rows->product_images != "")
                                    <img src="{{ asset('upload/products/'.$rows->product_images) }}" style="width: 100px;">
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_name }} </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_hot == 1)
                                    <span class="fa fa-check"></span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ number_format($rows->product_price) }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_discount }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_quantity}} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_ram }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_memory }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_color }} </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_status == 1)
                                    <span class="text-primary">Hiện</span>
                                @else
                                    <span class="text-danger">Ẩn</span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_cn == 1)
                                    <span class="text-primary">Chống Nước</span>
                                @else
                                    <span class="text-danger">Không Chống Nước</span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;">{{ $rows->category['category_name'] }}</td>
                            <td style="text-align:center; vertical-align: middle; width: 125px;">
                                @if (session('user_status') == 0 || session('user_status') == 2)
                                    <span><a style="font-size: 16px;" href="{{ route('products.show', $rows->id) }}" class="label label-info">Sửa</a></span>
                                    </br></br>
                                    <span><a style="font-size: 16px;" href="{{ route('products.destroy', $rows->id) }}" onclick="return window.confirm('Are you sure?');" class="label label-danger">Xóa</a></span>
                                @else
                                    Chỉ Xem
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @elseif (isset($_GET['key']))
                    @foreach ($search as $rows)
                        <tr class="stt">
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if(file_exists('upload/products/'.$rows->product_images) && $rows->product_images != "")
                                    <img src="{{ asset('upload/products/'.$rows->product_images) }}" style="width: 100px;">
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_name }} </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_hot == 1)
                                    <span class="fa fa-check"></span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ number_format($rows->product_price) }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_discount }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_quantity}} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_ram }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_memory }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_color }} </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_status == 1)
                                    <span class="text-primary">Hiện</span>
                                @else
                                    <span class="text-danger">Ẩn</span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_cn == 1)
                                    <span class="text-primary">Chống Nước</span>
                                @else
                                    <span class="text-danger">Không Chống Nước</span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;">{{ $rows->category['category_name'] }}</td>
                            <td style="text-align:center; vertical-align: middle; width: 125px;">
                                @if (session('user_status') == 0 || session('user_status') == 2)
                                    <span><a style="font-size: 16px;" href="{{ route('products.show', $rows->id) }}" class="label label-info">Sửa</a></span>
                                    </br></br>
                                    <span><a style="font-size: 16px;" href="{{ route('products.destroy', $rows->id) }}" onclick="return window.confirm('Are you sure?');" class="label label-danger">Xóa</a></span>
                                @else
                                    Chỉ Xem
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($data as $rows)
                        <tr class="stt">
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if(file_exists('upload/products/'.$rows->product_images) && $rows->product_images != "")
                                    <img src="{{ asset('upload/products/'.$rows->product_images) }}" style="width: 100px;">
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_name }} </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_hot == 1)
                                    <span class="fa fa-check"></span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ number_format($rows->product_price) }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_discount }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_quantity}} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_ram }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_memory }} </td>
                            <td style="text-align:center; vertical-align: middle;"> {{ $rows->product_color }} </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_status == 1)
                                    <span class="text-primary">Hiện</span>
                                @else
                                    <span class="text-danger">Ẩn</span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;">
                                @if ($rows->product_cn == 1)
                                    <span class="text-primary">Chống Nước</span>
                                @else
                                    <span class="text-danger">Không Chống Nước</span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align: middle;">{{ $rows->category['category_name'] }}</td>
                            <td style="text-align:center; vertical-align: middle; width: 125px;">
                                @if (session('user_status') == 0 || session('user_status') == 2)
                                    <span><a style="font-size: 16px;" href="{{ route('products.show', $rows->id) }}" class="label label-info">Sửa</a></span>
                                    </br></br>
                                    <span><a style="font-size: 16px;" href="{{ route('products.destroy', $rows->id) }}" onclick="return window.confirm('Are you sure?');" class="label label-danger">Xóa</a></span>
                                @else
                                    Chỉ Xem
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tr>
            </table>
            <!-- ham render su dung de phan trang -->
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
