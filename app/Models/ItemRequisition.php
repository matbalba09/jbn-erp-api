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
        'supplier_id',
        'is_deleted',
    ];

    public function supplier_v2()
    {
        return $this->belongsTo(SupplierV2::class, 'supplier_id');
    }
}
