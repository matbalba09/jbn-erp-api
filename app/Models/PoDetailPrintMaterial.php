<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDetailPrintMaterial extends Model
{
    use HasFactory;

    protected $table = 'po_detail_print_material';

    protected $fillable = [
        'po_detail_id',
        'print_material_id',
    ];
}
