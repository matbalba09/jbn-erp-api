<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_no',
        'date',
        'payment_method',
        'amount',
        'description',
        'documents',
        'status',
        'is_deleted',
    ];
}
