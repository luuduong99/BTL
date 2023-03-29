@extends('frontend.main.layoutcat')
@section('content')
<div class="col-xs-12 col-md-12">
    <div class="row" style="border-bottom: 1px solid black;">
        <div class="col-6 col-sm-6 col-md-9 col-lg-9 col-xl-9" style="padding-top: 25px;">
            @if (isset($_GET["fromPrice"]))
                <h2 style="color: #288ad6;">Điện Thoại {{ $cat->category_name }}/Giá từ <?php echo number_format($fromPrice); ?> VNĐ đến <?php echo number_format($toPrice); ?> VNĐ</h2>
            @elseif (isset($_GET["ram"]))
                <h2 style="color: #288ad6;">Điện Thoại {{ $cat->category_name }}/Ram {{ $ram }}GB </h2>
            @elseif (isset($_GET["memory"]))
                <h2 style="color: #288ad6;">Điện Thoại {{ $cat->category_name }}/Bộ Nhớ Trong {{ $memory }}GB </h2>
            @elseif (isset($_GET["cn"]) && $_GET["cn"] == 1)
                <h2 style="color: #288ad6;">Điện Thoại {{ $cat->category_name }}/ Chống được nước </h2>
            @elseif (isset($_GET["cn"]) && $_GET["cn"] == 0)
                <h2 style="color: #288ad6;">Điện Thoại {{ $cat->category_name }}/ Không có khả năng chống nước </h2>
            @else
                <h2 style="color: #288ad6;">Điện Thoại {{ $cat->category_name }}</h2>
            @endif
        </div>
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 10px;">
            <label for="">Sắp xếp theo</label>
            <form action="">
                @csrf
                <select name="sort" id="sort">
                    <option style="text-align: center;" value="{{ Request::url() }}?sort_by=none">----Sắp xếp----</option>
                    <option style="text-align: center;" <?php if($order == "priceAsc"): ?> selected <?php endif; ?> value="{{ Request::url() }}?sort_by=priceAsc">----Giá Tăng Dần----</option>
                    <option style="text-align: center;" <?php if($order == "priceDesc"): ?> selected <?php endif; ?> value="{{ Request::url() }}?sort_by=priceDesc">----Giá Giảm Dần----</option>
                    <option style="text-align: center;" <?php if($order == "nameAsc"): ?> selected <?php endif; ?> value="{{ Request::url() }}?sort_by=nameAsc">----Tên Từ A Đến Z----</option>
                    <option style="text-align: center;" <?php if($order == "nameDesc"): ?> selected <?php endif; ?> value="{{ Request::url() }}?sort_by=nameDesc">----Tên Từ Z Đến A----</option>
                </select>
            </form>
        </div>
    </div>
    <div class="remain-product">
        <div class="row">
            @if (isset($_GET["fromPrice"]))
                <?php foreach($price as $itemProduct): ?>
                    @if ($cat->id == $itemProduct->category_id)
                        <div class="col-md-4" style="display: flex; position: relative;">
                            <div class="card" style="margin-right: 20px;">
                                <div class="card-img">
                                    <img src="{{ asset('upload/products/'.$itemProduct->product_images) }}" title="{{ $itemProduct->product_name }}" alt="{{ $itemProduct->product_name }}" class="card-img-top" >
                                </div>
                                <div class="card-body">
                                    <h5 style="font-size: 20px;" class="card-title"><a href="{{ route('front.detail', $itemProduct->id) }}"> {{ $itemProduct->product_name }} </a></h5>
                                    @if ($itemProduct->product_discount > 0)
                                        <p class="price-box"> <span class="special-price">
                                            <span class="price" style="text-decoration:line-through;">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ - {{ $itemProduct->product_discount }}% </span>
                                        </p>
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> {{ number_format($itemProduct->product_price - ($itemProduct->product_price * $itemProduct->product_discount)/100) }} </span>₫ </span> </p>
                                    @else
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price">
                                            <span class="price">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ </span>
                                        </p>
                                        </br>
                                    @endif
                                    <p class="price-box" style="display: flex;">
                                            <span>Còn Lại: {{ $itemProduct->product_quantity }} sản phẩm</span>
                                        </p>
                                    <p class="price-box"> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> </p>
                                    @if ($itemProduct->product_quantity > 0)
                                        <a href="{{ route('front.addCart',['id' => $itemProduct->id]) }}" style="font-size: 16px; margin-left: 55px;" class="btn btn-primary">Thêm vào rỏ hàng</a>
                                    @else
                                        <p class="btn btn-secondary" style="font-size: 16px; margin-left: 46px; outline: none;">Sản phẩm đã bán hết</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                <?php endforeach; ?>
            @elseif (isset($_GET["ram"]))
                <?php foreach($searchRam as $itemProduct): ?>
                    @if ($cat->id == $itemProduct->category_id)
                        <div class="col-md-4" style="display: flex; position: relative;">
                            <div class="card" style="margin-right: 20px;">
                                <div class="card-img">
                                    <img src="{{ asset('upload/products/'.$itemProduct->product_images) }}" title="{{ $itemProduct->product_name }}" alt="{{ $itemProduct->product_name }}" class="card-img-top" >
                                </div>
                                <div class="card-body">
                                    <h5 style="font-size: 20px;" class="card-title"><a href="{{ route('front.detail', $itemProduct->id) }}"> {{ $itemProduct->product_name }} </a></h5>
                                    @if ($itemProduct->product_discount > 0)
                                        <p class="price-box"> <span class="special-price">
                                            <span class="price" style="text-decoration:line-through;">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ - {{ $itemProduct->product_discount }}% </span>
                                        </p>
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> {{ number_format($itemProduct->product_price - ($itemProduct->product_price * $itemProduct->product_discount)/100) }} </span>₫ </span> </p>
                                    @else
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price">
                                            <span class="price">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ </span>
                                        </p>
                                        </br>
                                    @endif
                                    <p class="price-box" style="display: flex;">
                                            <span>Còn Lại: {{ $itemProduct->product_quantity }} sản phẩm</span>
                                        </p>
                                    <p class="price-box"> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> </p>
                                    @if ($itemProduct->product_quantity > 0)
                                        <a href="{{ route('front.addCart',['id' => $itemProduct->id]) }}" style="font-size: 16px; margin-left: 55px;" class="btn btn-primary">Thêm vào rỏ hàng</a>
                                    @else
                                        <p class="btn btn-secondary" style="font-size: 16px; margin-left: 46px; outline: none;">Sản phẩm đã bán hết</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                <?php endforeach; ?>
            @elseif (isset($_GET["memory"]))
                <?php foreach($searchMemory as $itemProduct): ?>
                    @if ($cat->id == $itemProduct->category_id)
                        <div class="col-md-4" style="display: flex; position: relative;">
                            <div class="card" style="margin-right: 20px;">
                                <div class="card-img">
                                    <img src="{{ asset('upload/products/'.$itemProduct->product_images) }}" title="{{ $itemProduct->product_name }}" alt="{{ $itemProduct->product_name }}" class="card-img-top" >
                                </div>
                                <div class="card-body">
                                    <h5 style="font-size: 20px;" class="card-title"><a href="{{ route('front.detail', $itemProduct->id) }}"> {{ $itemProduct->product_name }} </a></h5>
                                    @if ($itemProduct->product_discount > 0)
                                        <p class="price-box"> <span class="special-price">
                                            <span class="price" style="text-decoration:line-through;">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ - {{ $itemProduct->product_discount }}% </span>
                                        </p>
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> {{ number_format($itemProduct->product_price - ($itemProduct->product_price * $itemProduct->product_discount)/100) }} </span>₫ </span> </p>
                                    @else
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price">
                                            <span class="price">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ </span>
                                        </p>
                                        </br>
                                    @endif
                                    <p class="price-box" style="display: flex;">
                                            <span>Còn Lại: {{ $itemProduct->product_quantity }} sản phẩm</span>
                                        </p>
                                    <p class="price-box"> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> </p>
                                    @if ($itemProduct->product_quantity > 0)
                                        <a href="{{ route('front.addCart',['id' => $itemProduct->id]) }}" style="font-size: 16px; margin-left: 55px;" class="btn btn-primary">Thêm vào rỏ hàng</a>
                                    @else
                                        <p class="btn btn-secondary" style="font-size: 16px; margin-left: 46px; outline: none;">Sản phẩm đã bán hết</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                <?php endforeach; ?>
            @elseif (isset($_GET["cn"]))
                <?php foreach($searchCn as $itemProduct): ?>
                    @if ($cat->id == $itemProduct->category_id)
                        <div class="col-md-4" style="display: flex; position: relative;">
                            <div class="card" style="margin-right: 20px;">
                                <div class="card-img">
                                    <img src="{{ asset('upload/products/'.$itemProduct->product_images) }}" title="{{ $itemProduct->product_name }}" alt="{{ $itemProduct->product_name }}" class="card-img-top" >
                                </div>
                                <div class="card-body">
                                    <h5 style="font-size: 20px;" class="card-title"><a href="{{ route('front.detail', $itemProduct->id) }}"> {{ $itemProduct->product_name }} </a></h5>
                                    @if ($itemProduct->product_discount > 0)
                                        <p class="price-box"> <span class="special-price">
                                            <span class="price" style="text-decoration:line-through;">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ - {{ $itemProduct->product_discount }}% </span>
                                        </p>
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> {{ number_format($itemProduct->product_price - ($itemProduct->product_price * $itemProduct->product_discount)/100) }} </span>₫ </span> </p>
                                    @else
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price">
                                            <span class="price">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ </span>
                                        </p>
                                        </br>
                                    @endif
                                    <p class="price-box" style="display: flex;">
                                            <span>Còn Lại: {{ $itemProduct->product_quantity }} sản phẩm</span>
                                        </p>
                                    <p class="price-box"> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> </p>
                                    @if ($itemProduct->product_quantity > 0)
                                        <a href="{{ route('front.addCart',['id' => $itemProduct->id]) }}" style="font-size: 16px; margin-left: 55px;" class="btn btn-primary">Thêm vào rỏ hàng</a>
                                    @else
                                        <p class="btn btn-secondary" style="font-size: 16px; margin-left: 46px; outline: none;">Sản phẩm đã bán hết</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                <?php endforeach; ?>
            @else
                <?php foreach($sort as $itemProduct): ?>
                    @if ($cat->id == $itemProduct->category_id)
                        <div class="col-md-4 category" style="display: flex; position: relative; margin-top: 15px;">
                            <div class="card" style="margin-right: 20px;">
                                <div class="card-img">
                                    <img src="{{ asset('upload/products/'.$itemProduct->product_images) }}" title="{{ $itemProduct->product_name }}" alt="{{ $itemProduct->product_name }}" class="card-img-top" >
                                </div>
                                <div class="card-body">
                                    <h5 style="font-size: 20px;" class="card-title"><a href="{{ route('front.detail', $itemProduct->id) }}"> {{ $itemProduct->product_name }} </a></h5>
                                    @if ($itemProduct->product_discount > 0)
                                        <p class="price-box"> <span class="special-price">
                                            <span class="price" style="text-decoration:line-through;">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ - {{ $itemProduct->product_discount }}% </span>
                                        </p>
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> {{ number_format($itemProduct->product_price - ($itemProduct->product_price * $itemProduct->product_discount)/100) }} </span>₫ </span> </p>
                                    @else
                                        <p class="price-box" style="font-weight: 700;"> <span class="special-price">
                                            <span class="price">
                                                {{ number_format($itemProduct->product_price) }}
                                            </span> ₫ </span>
                                            </br>
                                        </p>
                                    @endif
                                    <p class="price-box" style="display: flex;">
                                            <span>Còn Lại: {{ $itemProduct->product_quantity }} sản phẩm</span>
                                        </p>
                                    <p class="price-box"> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> </p>
                                    @if ($itemProduct->product_quantity > 0)
                                        <a href="{{ route('front.addCart',['id' => $itemProduct->id]) }}" style="font-size: 16px; margin-left: 55px;" class="btn btn-primary">Thêm vào rỏ hàng</a>
                                    @else
                                        <p class="btn btn-secondary" style="font-size: 16px; margin-left: 46px; outline: none;">Sản phẩm đã bán hết</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                <?php endforeach; ?>
            @endif
        </div>
    </div>
</div>
@stop

