<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_no',
        'quotation_no',
        'status',
        'due_date',
        'entry_by',
        'entry_date',
        'remarks',
        'discount_price',
        'total_price',
        'is_deleted',
    ];

    public function quotation()
    {
        return $this->hasOne(Quotation::class, 'quotation_no', 'quotation_no');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'order_no', 'order_no');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function payment_details()
    {
        return $this->hasMany(Payment::class, 'order_no', 'order_no');
    }
}
