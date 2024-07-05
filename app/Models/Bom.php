<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bom extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'component_id',
        'unit_cost',
        'quantity',
        'uom',
        'bom_type_id',
        'is_deleted',
    ];

    public function bom_type()
    {
        return $this->belongsTo(BomType::class);
    }
}
