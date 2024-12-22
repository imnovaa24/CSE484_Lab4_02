<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function index()
    {
        // Lấy danh sách tất cả khách hàng
        $customers = Customer::all();

        // Truyền dữ liệu sang view
        return view('customers.index', compact('customers'));
    }

    /**
     * Tên bảng trong cơ sở dữ liệu.
     */
    protected $table = 'customers';

    /**
     * Các thuộc tính có thể được gán giá trị trực tiếp.
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];

    /**
     * Quan hệ với bảng Order (1-n).
     * Một khách hàng có thể có nhiều đơn hàng.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
