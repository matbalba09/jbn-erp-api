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
}
