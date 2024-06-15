<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequisitionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_no',
        'supplier',
        'name',
        'uom',
        'quantity',
        'requisition_type',
        'unit_price',
        'total_price',
        'remarks',
    ];
}
