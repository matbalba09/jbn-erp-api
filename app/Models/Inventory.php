<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_no',
        'item_code',
        'item_name',
        'reorder_level',
        'qty_on_hand',
        'item_type',
        'uom',
        'remarks',
    ];
}
