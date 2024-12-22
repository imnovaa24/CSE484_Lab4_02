<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách tất cả đơn hàng
        $orders = Order::with(['customer', 'orderDetails.product'])->get();
        $orders = Order::paginate(10);

        // Truyền dữ liệu sang view
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all(); // Lấy tất cả khách hàng
        $products = Product::all(); // Lấy tất cả sản phẩm
        return view('orders.create', compact('customers', 'products'));
    }

    // Xử lý lưu đơn hàng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|array',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'order_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Tạo mới đơn hàng
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Lưu chi tiết đơn hàng
        foreach ($request->product_id as $index => $productId) {
            $order->products()->attach($productId, ['quantity' => $request->quantity[$index]]);
        }

        // Quay lại danh sách đơn hàng với thông báo thành công
        return redirect()->route('orders.index')->with('success', 'Đơn hàng được tạo thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Lấy thông tin đơn hàng theo ID và kèm theo chi tiết sản phẩm
        $order = Order::with(['customer', 'orderDetails.product'])->findOrFail($id);

        // Truyền dữ liệu sang view
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Lấy thông tin đơn hàng và khách hàng
        $order = Order::with('orderDetails.product')->findOrFail($id);
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|string',
        ]);

        // Cập nhật thông tin đơn hàng
        $order = Order::findOrFail($id);
        $order->update([
            'customer_id' => $request->customer_id,
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Cập nhật đơn hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Xóa đơn hàng thành công!');
}
}
