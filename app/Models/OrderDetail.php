<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'item_name',
        'maker',
        'material',
        'color',
        'size',
        'print',
        'print_size',
        'design_url',
        'remarks',
        'quantity',
        'selling_price',
        'is_deleted',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
