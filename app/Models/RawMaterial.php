<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'maker',
        'material',
        'color',
        'size',
        'price',
        'is_deleted',
    ];

    // public function po_details()
    // {
    //     return $this->belongsToMany(PoDetail::class, 'po_detail_raw_material')
    //         ->using(PoDetailRawMaterial::class); // Specify pivot model
    // }
}
