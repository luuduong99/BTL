@extends('frontend.main.layoutcat')
@section('content')
<div class="col-xs-12 col-md-12">
<div class="row" style="border-bottom: 1px solid black;">
        <div class="col-lg-9">
            <h2>
                Tìm kiếm sản phẩm với từ khóa {{ $searchKey }}
            </h2>
        </div>
    </div>
    <div class="hot-product">
        <div class="card-hot-product" style="margin-top: 15px;">
            <div class="row">
                <?php foreach($search as $rows): ?>
                    <div class="col-md-4 category" style="display: flex; position: relative; margin-top: 15px;">
                        <div class="card" style="margin-right: 20px;">
                            <div class="card-img">
                                <img src="{{ asset('upload/products/'.$rows->product_images) }}" title="{{ $rows->product_name }}" alt="{{ $rows->product_name }}" class="card-img-top" >
                            </div>
                            <div class="card-body">
                                <h5 style="font-size: 20px;" class="card-title"><a href="{{ route('front.detail', $rows->id) }}"> {{ $rows->product_name }} </a></h5>
                                @if ($rows->product_discount > 0)
                                    <p class="price-box"> <span class="special-price">
                                        <span class="price" style="text-decoration:line-through;">
                                            {{ number_format($rows->product_price) }}
                                        </span> ₫ - {{ $rows->product_discount }}% </span>
                                    </p>
                                    <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> {{ number_format($rows->product_price - ($rows->product_price * $rows->product_discount)/100) }} </span>₫ </span> </p>
                                @else
                                    <p class="price-box" style="font-weight: 700;"> <span class="special-price">
                                        <span class="price">
                                            {{ number_format($rows->product_price) }}
                                        </span> ₫ </span>
                                    </p>
                                    </br>
                                @endif
                                <p class="price-box" style="display: flex;">
                                    <span>Còn Lại: {{ $rows->product_quantity }} sản phẩm</span>
                                </p>
                                <p class="price-box"> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}"></a> </p>
                                @if ($rows->product_quantity > 0)
                                    <a href="{{ route('front.addCart',['id' => $rows->id]) }}" style="font-size: 16px; margin-left: 55px;" class="btn btn-primary">Thêm vào rỏ hàng</a>
                                @else
                                    <p class="btn btn-secondary" style="font-size: 16px; margin-left: 46px; outline: none;">Sản phẩm đã bán hết</p>
                                @endif
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
@stop
