<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'product_name',
        'description',
        'quantity',
        'unit_price',
        'total_price',
    ];
}
