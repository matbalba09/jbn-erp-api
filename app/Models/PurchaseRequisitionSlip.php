<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequisitionSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'purchase_requisition_slip_no',
        'purchase_requisition_slip_date',
        'remarks',
    ];
}
