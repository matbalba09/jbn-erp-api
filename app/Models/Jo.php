<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jo extends Model
{
    use HasFactory;

    protected $fillable = [
        'jo_no',
        'po_no',
        'so_no',
        'shipment_date',
        'business_operation',
        'oic',
        'status',
        'production_date',
        'is_deleted'
    ];
}
