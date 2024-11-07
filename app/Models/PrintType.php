<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintType extends Model
{
    use HasFactory;

    protected $fillable = [
        'print',
        'material',
        'size',
        'price',
        'description',
        'remarks',
        'is_deleted',
    ];
}
