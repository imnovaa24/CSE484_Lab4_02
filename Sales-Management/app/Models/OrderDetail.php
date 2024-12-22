<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * Tên bảng trong cơ sở dữ liệu.
     */
    protected $table = 'order_details';

    /**
     * Các thuộc tính có thể được gán giá trị trực tiếp.
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];

    /**
     * Quan hệ với bảng Order (n-1).
     * Một chi tiết đơn hàng thuộc về một đơn hàng.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Quan hệ với bảng Product (n-1).
     * Một chi tiết đơn hàng thuộc về một sản phẩm.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
