@extends('layouts.app')

@section('title', 'Danh sách khách hàng')

@section('content')
<h1>Danh sách khách hàng</h1>
<a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Thêm khách hàng</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
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
        {{ $customers->links() }}
    </div>
@endsection
