<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_no',
        'company',
        'contact_person',
        'contact_no',
        'status',
        'address',
        'entry_by',
        'entry_date',
        'remarks',
        'is_deleted',
    ];
}
