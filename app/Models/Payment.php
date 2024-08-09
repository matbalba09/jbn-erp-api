<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_no',
        'issued_date',
        'ref_no',
        'paid_date',
        'payment_method',
        'amount',
        'description',
        'documents',
        'status',
        'check_no',
        'bank_name',
        'verified',
        'is_deleted',
    ];
}
