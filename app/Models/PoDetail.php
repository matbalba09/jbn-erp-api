<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'po_no',
        'inventory_id',
        'remarks',
        'name',
        'uom',
        'quantity',
        'unit_price',
        'total_price',
        'is_deleted',
    ];

    public function inventory()
    {
        return $this->belongsTo(Po::class, 'inventory_id');
    }

    public function raw_materials()
    {
        return $this->belongsToMany(RawMaterialV2::class, 'po_detail_raw_material');
    }

    public function print_materials()
    {
        return $this->belongsToMany(PrintMaterial::class, 'po_detail_print_material');
    }
}
