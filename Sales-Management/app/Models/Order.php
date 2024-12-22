<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Tên bảng trong cơ sở dữ liệu.
     */
    protected $table = 'orders';

    /**
     * Các thuộc tính có thể được gán giá trị trực tiếp.
     */
    protected $fillable = [
        'customer_id',
        'order_date',
        'status',
    ];

    /**
     * Quan hệ với bảng Customer (n-1).
     * Một đơn hàng thuộc về một khách hàng.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Quan hệ với bảng OrderDetail (1-n).
     * Một đơn hàng có thể chứa nhiều chi tiết đơn hàng.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
