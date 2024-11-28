<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDetailRawMaterial extends Model
{
    use HasFactory;

    protected $table = 'po_detail_raw_material';

    protected $fillable = [
        'po_detail_id',
        'raw_material_v2_id',
    ];
}