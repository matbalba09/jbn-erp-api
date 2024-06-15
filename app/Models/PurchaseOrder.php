<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_requisition_slip_detail_id',
        'supplier',
        'description',
        'purchase_order_date',
        'remarks',
    ];
}
