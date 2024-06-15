<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequisitionSlipDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_requisition_slip_no',
        'supplier',
        'item',
        'quantity',
        'remarks',
        'status',
    ];
}
