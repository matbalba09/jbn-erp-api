<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterialV2 extends Model
{
    use HasFactory;

    protected $table = 'raw_materials_v2';

    protected $fillable = [
        'maker',
        'material',
        'color',
        'size',
        'uom',
        'quantity',
        'unit_price',
        'total_price',
        'remarks',
        'is_deleted',
    ];

    public function po_details()
    {
        return $this->belongsToMany(PoDetail::class, 'po_detail_raw_material');
    }
}
