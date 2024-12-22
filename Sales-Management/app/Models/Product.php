<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function index()
    {
        // Lấy danh sách tất cả sản phẩm
        $products = Product::all();

        // Truyền dữ liệu sang view
        return view('products.index', compact('products'));
    }

    /**
     * Tên bảng trong cơ sở dữ liệu.
     */
    protected $table = 'products';

    /**
     * Các thuộc tính có thể được gán giá trị một cách trực tiếp (Mass Assignment).
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];

    /**
     * Quan hệ với bảng OrderDetail (1-n).
     * Một sản phẩm có thể nằm trong nhiều chi tiết đơn hàng.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
