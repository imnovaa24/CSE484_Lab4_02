@extends('layouts.app')

@section('title', 'Thêm sản phẩm mới')

@section('content')
<h1>Thêm sản phẩm mới</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Số lượng tồn kho</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
