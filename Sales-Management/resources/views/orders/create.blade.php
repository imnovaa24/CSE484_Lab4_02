@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tạo Đơn Hàng Mới</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_id" class="form-label">Khách Hàng</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">Chọn khách hàng</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Sản Phẩm</label>
            <select name="product_id[]" id="product_id" class="form-control" multiple required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - {{ number_format($product->price, 0, ',', '.') }} đ</option>
                @endforeach
            </select>
            @error('product_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Số Lượng</label>
            <input type="number" name="quantity[]" id="quantity" class="form-control" required min="1">
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Ngày Đặt Hàng</label>
            <input type="date" name="order_date" id="order_date" class="form-control" required>
            @error('order_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Đang chờ</option>
                <option value="completed">Đã hoàn thành</option>
                <option value="canceled">Đã hủy</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Lưu Đơn Hàng</button>
    </form>
</div>
@endsection
