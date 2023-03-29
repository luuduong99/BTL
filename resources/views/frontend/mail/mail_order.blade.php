<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center;">
        <h2>Xin chào {{ $cus->customer_name }}</h2>
        <p>Bạn Đã đặt hàng tại hệ thống của chúng tôi và đay là đơn hàng của bạn</p>
    </div>
    <div class="col-md-12" style="font-size: 14px;">
        <div class="panel panel-default" style="margin-bottom:5px;">
            <div class="panel-heading">Thông tin đơn hàng</div>
            <div class="panel-body">
                <table class="table table-bordered">

                    <tr>
                        <th style="width:150px;">Họ tên</th>
                        <th>{{ $cus->customer_name  }}</th>
                    </tr>
                    <tr>
                        <th style="width:150px;">Email</th>
                        <th>{{ $cus->customer_email  }}</th>
                    </tr>
                    <tr>
                        <th style="width:150px;">Địa chỉ</th>
                        <th>{{ $cus->customer_address  }}</th>
                    </tr>
                    <tr>
                        <th style="width:150px;">Điện thoại</th>
                        <th>{{ $cus->customer_phone  }}</th>
                    </tr>

                </table>
            </div>
        </div>
        <div class="panel panel-primary">
        <div class="panel-heading">Đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th style="width:80px;">Số Lượng</th>
                        <th style="width:80px;">Giá</th>
                        <th style="width:80px;">Giảm Giá</th>
                    </tr>
                    @foreach ($detail as $rows)
                        @if ($rows->order_id == $order->id)
                        <tr>
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
</div>
