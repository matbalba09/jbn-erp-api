<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bom extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'inventory_id',
        'quantity',
        'uom',
        'is_deleted',
    ];

    public function bom_type()
    {
        return $this->belongsTo(BomType::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    public function prs_supplier_item()
    {
        return $this->hasOne(PrsSupplierItem::class, 'id');
    }
}
