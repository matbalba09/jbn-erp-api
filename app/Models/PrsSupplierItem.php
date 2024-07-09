<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrsSupplierItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_supplier_id',
        'bom_id',
        'item_name',
        'inventory_id',
        'uom',
        'quantity',
        'unit_price',
        'is_deleted',
    ];

    public function prs_supplier()
    {
        return $this->belongsTo(PrsSupplier::class, 'prs_supplier_id');
    }

    public function bom()
    {
        return $this->belongsTo(Bom::class, 'bom_id');
    }
}
