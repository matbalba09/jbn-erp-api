<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrsSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_detail_id',
        'supplier_id',
        'name',
        'uom',
        'quantity',
        'unit_price',
        'is_deleted',
    ];

    public function prs_detail()
    {
        return $this->belongsTo(PurchaseRequisitionDetail::class, 'prs_detail_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    
    public function prs_supplier_item()
    {
        return $this->hasOne(PrsSupplierItem::class, 'prs_supplier_id');
    }
}
