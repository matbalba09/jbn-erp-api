<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequisition extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function prs_v2()
    {
        return $this->belongsTo(PrsV2::class, 'prs_v2_id');
    }

    // public function suppliers()
    // {
    //     return $this->belongsToMany(SupplierV2::class, 'supplier_id');
    // }

    public function suppliers()
    {
        return $this->belongsToMany(SupplierV2::class, 'item_requisition_supplier_v2');
    }
}
