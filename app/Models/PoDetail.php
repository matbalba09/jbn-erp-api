<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'remarks',
        'name',
        'uom',
        'quantity',
        'unit_price',
        'total_price',
        'is_deleted',
    ];
}
