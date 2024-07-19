<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'product_id',
        'uom',
        'quantity',
        'unit_price',
        'total_price',
        'remarks',
        'is_deleted',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
