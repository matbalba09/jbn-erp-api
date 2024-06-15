<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'quotation_no',
        'quotation_date',
        'total_price',
        'remarks',
    ];
}
