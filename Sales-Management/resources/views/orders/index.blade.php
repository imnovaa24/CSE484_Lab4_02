@extends('layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
<h1>Danh sách đơn hàng</h1>
<a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Thêm đơn hàng</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Khách hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->order_date }}</td>
            <td>{{ $order->status }}</td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
@endsection
