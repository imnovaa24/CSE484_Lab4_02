@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh sửa đơn hàng</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_id" class="form-label">Khách hàng</label>
            <select name="customer_id" id="customer_id" class="form-select" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $order->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
