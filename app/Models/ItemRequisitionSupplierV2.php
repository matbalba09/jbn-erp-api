<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequisitionSupplierV2 extends Model
{
    use HasFactory;

    protected $table = 'item_requisition_supplier_v2';

    protected $fillable = [
        'item_requisition_id',
        'supplier_v2_id',
    ];
}
