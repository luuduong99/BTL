@extends("admin.layout")
@section("load-data")
<div class="col-md-12" style="font-size: 18px;">
    <div class="panel panel-primary">
        <div class="panel-heading"><h1 style="text-align: center;">Quản lí đánh giá</h1></div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr style="text-align: center;">
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên tài khoản</th>
                        <th>Đánh giá(sao)</th>
                        <th style="width:100px;"></th>
                    </tr>
                @foreach ($data as $rows)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $loop->index + 1 }}</td>
                        <td style="vertical-align: middle; text-align: center;">
                            <img src="{{ asset('upload/products/'.$rows->product['product_images']) }}" title="{{ $rows->product_name }}" alt="{{ $rows->product_name }}" style="width: 100px;" class="card-img-top" >
                        </td>
                        <td style="vertical-align: middle;">{{ $rows->product['product_name'] }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $rows->customer['customer_acc'] }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $rows->rating }}</td>
                        <td style="text-align:center;">
                        </td>
                    </tr>
                    @endforeach
            </table>
            {{ $data->render() }}
        </div>
    </div>
</div>
@endsection
