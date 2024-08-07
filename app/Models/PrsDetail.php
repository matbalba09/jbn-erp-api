<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrsDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_id',
        'product_id',
        'name',
        'uom',
        'quantity',
        'unit_price',
        'total_price',
        'remarks',
        'is_deleted',
    ];

    // protected $with = ['prs_supplier.supplier'];

    public function prs()
    {
        return $this->belongsTo(Prs::class, 'prs_id');
    }
    
    public function prs_suppliers()
    {
        return $this->hasMany(PrsSupplier::class, 'prs_detail_id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
