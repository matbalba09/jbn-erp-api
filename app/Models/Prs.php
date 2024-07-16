<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prs extends Model
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

    public function prs_details()
    {
        return $this->hasMany(PrsDetail::class, 'prs_id');
    }
    
}
