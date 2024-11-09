<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrsV2 extends Model
{
    use HasFactory;

    protected $table = 'prs_v2';

    protected $fillable = [
        'prs_no',
        'customer_id',
        'prs_date',
        'due_date',
        'approved_by',
        'requested_by',
        'remarks',
        'discount_price',
        'status',
        'is_deleted',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function item_requisitions()
    {
        return $this->hasMany(ItemRequisition::class, 'prs_id');
    }
}
