@extends('frontend.main.layoutcat')
@section('content')
<div class="top">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 product-image ">
            <div class="img-thumbnail">
                <div class="media-body">
                    <img src="{{ asset('upload/products/'.$prod->product_images) }}" title="{{ $prod->product_name }}" alt="{{ $prod->product_name }}" class="card-img-top">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 info">
            <h1 itemprop="name" style="font-weight: 700;">{{ $prod->product_name }}</h1>
            @if ( $category->id = $prod->category_id)
            <p class="vendor" style="font-weight: 700;"> Category:&nbsp; <span>
                    {{ $prod->product_alias }}
                </span></p>
            @endif

            @if ($prod->product_discount > 0)
            <p class="price-box"><span class="special-price">
                    <span style="font-weight: 700;">Giảm Giá:&nbsp;</span><span class="price" style="text-decoration:line-through;">
                        {{ number_format($prod->product_price) }}
                    </span> ₫ - <span style="color: red;">{{ $prod->product_discount }}%</span> </span>
            </p>
            <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> Giá Sản Phẩm:&nbsp; {{ number_format($prod->product_price - ($prod->product_price * $prod->product_discount)/100) }} </span>₫ </span> </p>
            @else
            <p class="price-box" style="font-weight: 700;"> <span class="special-price"> <span class="price product-price"> Giá Sản Phẩm:&nbsp; {{ number_format($prod->product_price) }} </span>₫ </span> </p>
            @endif

            <p class="vendor" style="font-weight: 700;"> Ram:&nbsp; <span>
                    {{ $prod->product_ram }}GB
                </span></p>

            <p class="vendor" style="font-weight: 700;"> Memory:&nbsp; <span>
                    {{ $prod->product_memory }}GB
                </span></p>

            @if ($prod->product_cn == 1)
            <p class="vendor" style="font-weight: 700;"> Chức năng:&nbsp; <span>
                    Chống Nước
                </span></p>
            @else
            <p class="vendor"> Chức năng:&nbsp; <span>
                    Không Chống Nước
                </span></p>
            @endif
            @if (session('er'))
            <p style="color: red;">{{ session('er') }}</p>
            @endif
            <a href="{{ route('front.addCart',['id' => $prod->id]) }}" style="font-size: 16px;" class="btn btn-primary">Thêm Vào Giỏ Hàng</a>

            <!-- Rating -->
            <div style="border:1px solid #dddddd; margin-top: 15px;">
                <h1 style="font-weight: 700;">Đánh giá về điện thoại {{ $prod->product_name }}</h1>
                @if (session('customer_id'))
                <div style="align-items: center; display: flex; margin-bottom: 15px;">
                    <span style="color: #fe8c23; font-weight: bold; font-size: 30px;">{{ number_format($ratingAvg ,1) }}</span>
                    <div id="rateYo"></div><span>(có {{ $ratingCount }} đánh giá)</span>
                </div>
                @else
                <div style="align-items: center; display: flex; margin-bottom: 15px;">
                    <span style="color: #fe8c23; font-weight: bold; font-size: 30px;">{{ number_format($ratingAvg ,1) }}</span>
                    <div id="rateYo1"></div><span>(có {{ $ratingCount }} đánh giá)</span>
                </div>
                @endif
                <form action="{{ route('front.rating') }}" method="POST" class="form-inline" role="form" id="formRating">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="rating" id="rating">
                        <input type="hidden" class="form-control" name="product_id" value="{{ $prod->id }}">
                        <input type="hidden" class="form-control" name="customer_id" value="{{ session('customer_id') }}">
                    </div>
                </form>
                <h4 style="padding-left: 10px;">Rating</h4>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 80%; padding-left: 10px;"><img src="{{ asset('../../frontend/images/star.jpg') }}"></td>
                        <td><span class="label label-primary" style=" color: white; padding: 3px 20px; border-radius: 5px;"> {{ $rate1 }} vote</span></td>
                    </tr>
                    <tr>
                        <td style="width: 80%; padding-left: 10px;"><img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"></td>
                        <td><span class="label label-warning" style=" color: white; padding: 3px 20px; border-radius: 5px;"> {{ $rate2 }} vote</span></td>
                    </tr>
                    <tr>
                        <td style="width: 80%; padding-left: 10px;"><img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> </td>
                        <td><span class="label label-danger" style=" color: white; padding: 3px 20px; border-radius: 5px;"> {{ $rate3 }} vote</span></td>
                    </tr>
                    <tr>
                        <td style="width: 80%; padding-left: 10px;"><img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> </td>
                        <td><span class="label label-info" style=" color: white; padding: 3px 20px; border-radius: 5px;">{{ $rate4 }} vote</span></td>
                    </tr>
                    <tr>
                        <td style="width: 80%; padding-left: 10px;"><img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> <img src="{{ asset('../../frontend/images/star.jpg') }}"> </td>
                        <td><span class="label label-success" style=" color: white; padding: 3px 20px; border-radius: 5px;">{{ $rate5 }} vote</span></td>
                    </tr>
                </table>
                <br>
            </div>
            <!-- end rating -->
        </div>
    </div>
</div>
<div class="middle">
    <!-- chi tiet -->
    <div class="container" style="margin-top: 15px;">
        <p class="product_description">{!! $prod->product_description !!}</p>
        <div class="product_content">
            {!! $prod->product_content !!}
        </div>
        <style>
            .product_content img {
                width: 100%;
            }
        </style>
        <!-- chi tiet -->

        <!-- binh luan -->
        <h1>Bình luận về sản phẩm</h1>
        <div style="border:1px solid #dddddd; margin-top: 15px; padding: 10px;">
            @if (session('customer_id'))
            <form action="{{ route('front.comment',$prod->id) }}" method="post" style="font-size: 16px;">
                @csrf
                <div class="form-group">
                    <label for="">Nội dung bình luận</label>
                    <input type="hidden" value="{{ session('customer_id') }}" name="customer_id">
                    <input type="hidden" value="{{ session('customer_acc') }}" name="customer_acc">
                    <input type="hidden" value="{{ $prod->product_name }}" name="product_name">
                    <input type="hidden" value="{{ $prod->id }}" name="product_id">
                    <input type="hidden" value="0" name="reply_id">
                    <textarea style="font-size: 16px;" id="comment-content" name="content" class="form-control" rows="1" required placeholder="Nhập nội dung bình luận (*)"></textarea>
                    <input style="font-size: 16px; margin-top: 5px;" type="submit" value="Gửi bình luận" class="btn btn-primary">
                </div>
            </form>
            @else
            <form action="" method="POST" style="font-size: 16px;">
                @csrf
                <div class="form-group">
                    <label for="">Nội dung bình luận</label>
                    <input type="hidden" value="{{ session('customer_id') }}" name="customer_id">
                    <input type="hidden" value="{{ $prod->id }}" name="product_id">
                    <textarea style="font-size: 16px;" name="content" class="form-control" rows="1" id="" rows="3" required placeholder="Nhap noi dung binh luan (*)"></textarea>
                    <button style="color: white; margin-top: 5px; margin-bottom: 5px;" class="btn btn-danger"><a style="font-size: 16px; color: white;" href="{{ route('front.login') }}">Vui lòng đăng nhập để bình luận</a></button>
                </div>
            </form>
            @endif
            <h1>Các bình luận ({{ $commentCount }})</h1>
            <div class="media" style="display: block;">
                @foreach ($comment as $com)
                @if ($com->product_id == $prod->id && $com->reply_id == 0)
                <div style="margin-top: 15px;">
                    <div class="media-left">
                        @foreach ($cus as $c)
                        @if ($com->customer_id == $c->id && $c->customer_image == "" )
                        <img src="{{ asset('../../frontend/images/tini_1634707760106.jpg') }}" class="media-object" style="width:60px">
                        @elseif ($com->customer_id == $c->id && $c->customer_image != "")
                        <img src="{{ asset('upload/customers/'.$c->customer_image) }}" class="media-object" style="width:60px">
                        @endif
                        @endforeach
                    </div>
                    <div class="media-body" style="font-size: 16px;">
                        <h4 class="media-heading">{{ $com->customer_acc }}</h4>
                        <div>
                            <p>{{ $com->content }}</p>
                            @if (session('customer_id'))
                            <form action="{{ route('front.comment',$prod->id) }}" method="post" style="font-size: 16px; margin-top: 5px;">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" value="{{ session('customer_id') }}" name="customer_id">
                                    <input type="hidden" value="{{ session('customer_acc') }}" name="customer_acc">
                                    <input type="hidden" value="{{ $prod->product_name }}" name="product_name">
                                    <input type="hidden" value="{{ $prod->id }}" name="product_id">
                                    <input type="hidden" value="{{ $com->id }}" name="reply_id">
                                    <textarea style="font-size: 16px;" id="comment-content" name="content" class="form-control" rows="1" required placeholder="Nhập nội dung bình luânj (*)"></textarea>
                                    <input style="font-size: 16px; margin-top: 5px;" type="submit" value="Trả Lời" class="btn btn-primary">
                                </div>
                            </form>
                            @else
                            <button style="color: white; margin-top: 5px; margin-bottom: 5px;" class="btn btn-danger"><a style="font-size: 16px; color: white;" href="{{ route('front.login') }}">Vui lòng đăng nhập để bình luận</a></button>
                            @endif
                            @foreach ($comment as $comSub)
                            @if ($comSub->reply_id != 0 && $comSub->reply_id == $com->id)
                            <div>
                                <div class="media-left">
                                    @foreach ($cus as $c)
                                    @if ($comSub->customer_id == $c->id && $c->customer_image == "" )
                                    <img src="{{ asset('../../frontend/images/tini_1634707760106.jpg') }}" class="media-object" style="width:60px">
                                    @elseif ($comSub->customer_id == $c->id && $c->customer_image != "")
                                    <img src="{{ asset('upload/customers/'.$c->customer_image) }}" class="media-object" style="width:60px">
                                    @endif
                                    @endforeach
                                </div>
                                <div class="media-body" style="font-size: 16px;">
                                    <h4 class="media-heading">{{ $comSub->customer_acc }}</h4>
                                    <div>
                                        <p>{{ $comSub->content }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- binh luan -->
</div>
</div>

@stop

@section('detailJs')
<script type="text/javascript">
    $(function() {
        let ratingAvg = '{{ $ratingAvg }}';
        if (ratingAvg == 0) {
            $("#rateYo").rateYo({
                rating: 0,
                normalFill: "#A0A0A0",
                ratedFill: "#fe8c23",
                fullStar: true,
            }).on("rateyo.set", function(e, data) {
                $('#rating').val(data.rating);
                $('#formRating').submit();
            });

            $("#rateYo1").rateYo({
                rating: 0,
                normalFill: "#A0A0A0",
                ratedFill: "#fe8c23",
                fullStar: true,
            }).on("rateyo.set", function(e, data) {
                alert("Bạn chưa đăng nhập");
            });
        } else {
            $("#rateYo").rateYo({
                rating: ratingAvg,
                normalFill: "#A0A0A0",
                ratedFill: "#fe8c23",
                fullStar: true,
            }).on("rateyo.set", function(e, data) {
                $('#rating').val(data.rating);
                $('#formRating').submit();
            });

            $("#rateYo1").rateYo({
                rating: ratingAvg,
                normalFill: "#A0A0A0",
                ratedFill: "#fe8c23",
                fullStar: true,
            }).on("rateyo.set", function(e, data) {
                alert("Bạn chưa đăng nhập");
            });
        }
    });
</script>
@stop
