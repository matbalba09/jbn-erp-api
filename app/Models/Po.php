<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    use HasFactory;

    protected $fillable = [
        'po_no',
        'supplier_id',
        'order_no',
        'po_date',
        'status',
        'remarks',
        'ship_to',
        'delivery_date',
        'payment_terms',
        'requested_by',
        'approved_by',
        'received_by',
        'is_deleted',
    ];

    public function po_details()
    {
        return $this->hasOne(PoDetail::class, 'po_no', 'po_no');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_no', 'order_no');
    }
}