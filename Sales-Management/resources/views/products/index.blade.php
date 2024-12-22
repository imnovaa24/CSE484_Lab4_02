@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<h1>Danh sách sản phẩm</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Số lượng tồn kho</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
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
        {{ $products->links() }}
    </div>
@endsection
