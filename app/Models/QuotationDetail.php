<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_no',
        'prs_id',
        'item_name',
        'maker',
        'material',
        'color',
        'size',
        'print',
        'print_size',
        'design_url',
        'remarks',
        'quantity',
        'selling_price',
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
