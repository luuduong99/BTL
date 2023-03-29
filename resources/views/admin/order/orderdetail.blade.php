@extends("admin.layout")
@section("load-data")
<div class="col-md-12" style="font-size: 14px;">
    <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading" style="font-size: 25px;">Thông tin khách hàng</div>
        <div class="panel-body" style="font-size: 16px;">
            <table class="table table-bordered">

                <tr>
                    <th style="width:150px;">Họ tên</th>
                    <th>{{ $order->customer['customer_name'] }}</th>
                </tr>
                <tr>
                    <th style="width:150px;">Email</th>
                    <th>{{ $order->customer['customer_email'] }}</th>
                </tr>
                <tr>
                    <th style="width:150px;">Địa chỉ</th>
                    <th>{{ $order->customer['customer_address'] }}</th>
                </tr>
                <tr>
                    <th style="width:150px;">Điện thoại</th>
                    <th>{{ $order->customer['customer_phone'] }}</th>
                </tr>

            </table>
        </div>
        <div style="font-size: 16px;" class="panel-footer"><a href="#" onclick="history.go(-1);" class="btn btn-primary">Quay lại</a></div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading" style="font-size: 25px;">Thông tin đơn hàng</div>
        <div class="panel-body" style="font-size: 16px;">
            <table class="table table-bordered table-hover">
                    <tr>
                        <th style="width:100px;">Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th style="width:80px;">Số lượng</th>
                        <th style="width:80px;">Giá sản phẩm</th>
                        <th style="width:80px;">Giảm giá</th>
                    </tr>
                    @foreach ($detail as $rows)
                        @if ($rows->order_id == $order->id)
                        <tr>
                            <td style="vertical-align: middle;">
                                <img src="{{ asset('upload/products/'.$rows->product['product_images']) }}" title="{{ $rows->product_name }}" alt="{{ $rows->product_name }}" style="width: 100px;" class="card-img-top" >
                            </td>
                            <td style="vertical-align: middle;">{{ $rows->product_name }}</td>
                            <td style="vertical-align: middle;">{{ $rows->quantity }}</td>
                            <td style="vertical-align: middle;">{{ number_format($rows->product_price) }}</td>
                            <td style="text-align:center;vertical-align: middle;">{{ $rows->product['product_discount'] }}%</td>
                        </tr>

                        @endif
                    @endforeach
            </table>
            <h2 style="text-align: right;">Tổng tiền thanh toán:<span>{{ number_format($order->total_price) }}₫</span></h2>
        </div>
    </div>
</div>

@stop
