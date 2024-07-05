<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_deleted',
    ];

    public function boms()
    {
        return $this->hasMany(Bom::class);
    }
}
