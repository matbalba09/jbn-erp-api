<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_id',
        'order_no',
        'supplier_id',
        'status',
        'po_date',
        'remarks',
        'is_deleted',
    ];
}
