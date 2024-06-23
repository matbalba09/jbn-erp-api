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
        'requested_by',
        'approved_by',
        'remarks',
        'is_deleted',
    ];
}
