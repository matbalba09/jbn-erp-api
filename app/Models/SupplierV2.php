<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierV2 extends Model
{
    use HasFactory;

    protected $table = 'suppliers_v2';
    
    protected $fillable = [
        'supplier_name',
        'uom',
        'quantity',
        'price',
        'operation',
        'remarks',
        'is_deleted',
    ];
}
