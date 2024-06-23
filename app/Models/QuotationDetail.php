<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_no',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
        'is_deleted',
    ];
}
