<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_no',
        'prs_date',
        'customer_id',
        'requested_by',
        'approved_by',
        'remarks',
        'status',
        'is_deleted',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function products()
    {
        return $this->hasMany(PurchaseRequisitionDetail::class, 'prs_id');
    }
}
