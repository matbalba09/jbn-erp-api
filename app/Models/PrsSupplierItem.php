<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrsSupplierItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_supplier_id',
        'bom_id',
        'quantity',
        'uom',
        'price',
        'is_deleted',
    ];
}
