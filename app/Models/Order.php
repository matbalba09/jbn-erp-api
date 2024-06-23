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
        'is_deleted',
    ];
}
