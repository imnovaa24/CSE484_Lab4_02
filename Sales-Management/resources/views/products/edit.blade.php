@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh sửa sản phẩm</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng tồn kho</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
