<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_no',
        'product_id',
        'name',
        'uom',
        'quantity',
        'unit_price',
        'total_price',
        'is_deleted',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, "quotation_no");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
