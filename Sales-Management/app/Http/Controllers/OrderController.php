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
        
        $orders = Order::with(['customer', 'orderDetails.product'])->get();
        $orders = Order::paginate(10);

        
        return view('orders.index', compact('orders'));
    }


    public function create()
    {
        $customers = Customer::all(); 
        $products = Product::all(); 
        return view('orders.create', compact('customers', 'products'));
    }

   
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

        foreach ($request->product_id as $index => $productId) {
            $order->products()->attach($productId, ['quantity' => $request->quantity[$index]]);
        }

        return redirect()->route('orders.index')->with('success', 'Đơn hàng được tạo thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $order = Order::with(['customer', 'orderDetails.product'])->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    
    public function edit($id)
    {
    
        $order = Order::with('orderDetails.product')->findOrFail($id);
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'customers'));
    }

  
    public function update(Request $request, $id)
    {
    
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|string',
        ]);

       
        $order = Order::findOrFail($id);
        $order->update([
            'customer_id' => $request->customer_id,
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Cập nhật đơn hàng thành công!');
    }

  
    public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Xóa đơn hàng thành công!');
}
}
