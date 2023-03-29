@extends('frontend.main.layout')
@section('product')
<!-- Hot Product -->
    <div class="container">
        <h1 style="border-bottom: 1px solid gray;font-weight: 900;margin-bottom: 20px;margin-top: 15px;"><span style="color: red;">HOT</span> PRODUCT</h1>
        <div class="products">
            <div class="image-slide">
                <?php foreach($hotProduct as $rows): ?>
                    <div class="card">
                        <div class="card-top">
                            <img style="height: 200px;" src="{{ asset('upload/products/'.$rows->product_images) }}" title="{{ $rows->product_name }}" alt="{{ $rows->product_name }}" class="card-img-top" >
                        </div>
                        <div class="card-body">
                            <h5 style="font-size: 16px; " class="card-title"><a style="outline: none;" href="{{ route('front.detail', $rows->id) }}"> {{ $rows->product_name }} </a></h5>
                            @if ($rows->product_discount > 0)
                                <p class="price-box" > <span class="special-price">
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
                            <p class="price-box" style="display: flex;">
                                <span>Có thể bán: {{ $rows->product_cl }} sản phẩm</span>
                            </p>
                            <p class="price-box" style="display: flex;">
                                <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                            </p>
                            @if ($rows->product_quantity > 0)
                            <a href="{{ route('front.addCart',['id' => $rows->id]) }}" style="font-size: 16px;margin-left: 25px; outline: none;" class="btn btn-primary">Thêm vào rỏ hàng</a>
                            @else
                                <p>Sản phẩm đã bán hết</p>
                            @endif
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<!-- End Hot Product -->

<!-- Remain Product -->
<?php foreach($category as $itemCategory): ?>
    @if ($itemCategory->p_category_id == 0)
        <div class="container">
            <h1 style="border-bottom: 1px solid gray;font-weight: 900;margin-bottom: 20px;"><span style="color: red;"><?php echo $itemCategory->category_name; ?></span> </h1>
                <div class="products">
                    <div class="image-slide">
                        <?php foreach($product as $itemProduct): ?>
                            @if ($itemCategory->id == $itemProduct->category_id)
                                <div class="card">
                                    <img style="height: 200px;" src="{{ asset('upload/products/'.$itemProduct->product_images) }}" title="{{ $itemProduct->product_name }}" alt="{{ $itemProduct->product_name }}" class="card-img-top" >
                                    <div class="card-body">
                                        <h5 style="font-size: 16px;" class="card-title"><a style="outline: none;" href="{{ route('front.detail', $itemProduct->id) }}"> {{ $itemProduct->product_name }} </a></h5>
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
                                        <p class="price-box" style="display: flex;">
                                            <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                            <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                            <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                            <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                            <a href=""><img src="{{ asset('../../frontend/images/star.jpg') }}" /></a>
                                        </p>
                                        @if ($itemProduct->product_quantity > 0)
                                        <a href="{{ route('front.addCart',['id' => $itemProduct->id]) }}" style="font-size: 16px; margin-left: 25px; outline: none;"  class="btn btn-primary">Thêm vào rỏ hàng</a>
                                        @else
                                            <p class="btn btn-secondary" style="font-size: 16px; margin-left: 14px; outline: none;">Sản phẩm đã bán hết</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    @endif
<?php endforeach; ?>
<!-- End Remain Product -->
@stop
