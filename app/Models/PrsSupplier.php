<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrsSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_supplier',
        'prs_detail_id',
        'bom_id',
        'supplier_id',
        'quantity',
        'uom',
        'price',
        'prs_supplier_type_id',
        'is_deleted',
    ];
}
