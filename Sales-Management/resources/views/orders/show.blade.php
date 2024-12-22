@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết đơn hàng</h1>
    <div class="card mb-4">
        <div class="card-header">
            Thông tin đơn hàng
        </div>
        <div class="card-body">
            <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
            <p><strong>Khách hàng:</strong> {{ $order->customer->name }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->customer->address }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->customer->phone }}</p>
            <p><strong>Email:</strong> {{ $order->customer->email }}</p>
            <p><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</p>
            <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Chi tiết sản phẩm
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->product->price, 0, ',', '.') }} đ</td>
                        <td>{{ number_format($detail->quantity * $detail->product->price, 0, ',', '.') }} đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
