<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_no',
        'prs_no',
        'quotation_date',
        'description',
        'valid_until',
        'total_price',
        'discount_price',
        'requested_by',
        'approved_by',
        'received_by',
        'remarks',
        'status',
        'is_deleted',
    ];

    public function quotation_details()
    {
        return $this->hasMany(QuotationDetail::class, 'quotation_no', 'quotation_no');
    }

    public function prs()
    {
        return $this->hasOne(PrsV2::class, 'prs_no', 'prs_no');
    }
}
