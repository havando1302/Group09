<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Các cột được phép gán dữ liệu hàng loạt
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'size',    // thêm trường size (nếu có)
        'color',   // thêm trường color (nếu có)
    ];

    /**
     * Quan hệ: Một item thuộc về một đơn hàng
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Quan hệ: Một item thuộc về một sản phẩm
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
