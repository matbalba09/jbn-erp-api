<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'print',
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
        return $this->belongsToMany(PoDetail::class, 'po_detail_print_material');
    }
}
