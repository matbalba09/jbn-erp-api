<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_no',
        'name',
        'description',
        'price',
        'status',
        'remarks',
        'image',
        'is_deleted',
    ];

    public function bom()
    {
        return $this->hasMany(Bom::class, 'product_id');
    }

    public function prs_details()
    {
        return $this->hasOne(PrsDetail::class, 'product_id');
    }

    public function quotation_details()
    {
        return $this->hasOne(QuotationDetail::class, 'product_id');
    }
}
