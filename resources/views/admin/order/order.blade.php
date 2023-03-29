@extends("admin.layout")
@section("load-data")
<div class="col-md-12" style="font-size: 14px;">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Danh sách đơn hàng</h1></div>
        <div class="panel-body" style="font-size: 16px;">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Họ và Tên</th>
                    <th>Địa Chỉ</th>
                    <th>Điện Thoại</th>
                    <th>Ngày Mua</th>
                    <th>Giá</th>
                    <th>Ghi chú</th>
                    <th>Thương thức thanh toán</th>
                    <th style="width: 150px;">Trạng Thái</th>
                    <th style="width:150px;"></th>
                </tr>
                @foreach ($order as $rows)
                    <tr class="stt">
                        <td style="text-align: center;"></td>
                        <td>{{ $rows->customer['customer_name'] }}</td>
                        <td>{{ $rows->customer['customer_address'] }}</td>
                        <td>{{ $rows->customer['customer_phone'] }}</td>
                        <td>{{ $rows->created_at }}</td>
                        <td>{{ number_format($rows->total_price) }}</td>
                        <td>
                            @if ($rows->order_note == "")
                                <p>Không có ghi chú</p>
                            @else
                                {{ $rows->order_note }}
                            @endif
                        </td>
                        <td>
                            @if ($rows->order_pt == 0)
                                <p>Thanh toán khi nhận hàng</p>
                            @else
                                <p>Thanh toán  online</p>
                                <ul>
                                    <li>Tên ngân hàng: {{ $rows->code_bank }}</li>
                                    <li>Mã thanh toán: {{ $rows->code_vnpay }}</li>
                                    <li>Ngày giao dịch: {{ $rows->created_at }}</li>
                                </ul>
                            @endif
                        </td>
                        <td style="text-align:center;">
                            @if ($rows->order_status == 0 && $rows->order_pt == 0)
                                <div class="">Chưa thanh toán, đợi giao hàng</div>
                            @elseif ($rows->order_status == 0 && $rows->order_pt == 1)
                                <div class="">Đã thanh toán, đợi giao hàng</div>
                            @elseif ($rows->order_status == 1 && $rows->order_pt == 0)
                                <div class="">Đã thanh toán, giao hàng thành công</div>
                            @elseif ($rows->order_status == 1 && $rows->order_pt == 1)
                                <div class="">Giao hàng thành công</div>
                            @elseif ($rows->order_status == 2)
                                <div class="" style="color: red;">Đơn hàng đã hủy</div>
                            @endif
                        </td>
                        <td>
                            @if (session('user_status') == 0 || session('user_status') == 3)
                                @if ($rows->order_status == 0)
                                    <a style="font-size: 16px;" href="{{ route('orders.delivery', $rows->id) }}" class="label label-info">Giao hàng</a></br></br>
                                    <a style="font-size: 16px;" href="{{ route('orders.delivery1', $rows->id) }}" class="label label-danger">Hủy đơn</a>
                                @else
                                    <a style="font-size: 16px;" href="{{ route('orders.detail', $rows->id) }}" class="label label-success">Chi tiết</a>
                                @endif
                            @else
                                @if ($rows->order_status != 0)
                                    <a style="font-size: 16px;" href="{{ route('orders.detail', $rows->id) }}" class="label label-success">Chi tiết</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>

            {{ $order->render() }}
        </div>
    </div>
</div>
@stop
