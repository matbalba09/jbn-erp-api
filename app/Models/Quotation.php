<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_no',
        'quotation_date',
        'valid_until',
        'total_price',
        'requested_by',
        'approved_by',
        'received_by',
        'remarks',
        'is_deleted',
    ];
}
