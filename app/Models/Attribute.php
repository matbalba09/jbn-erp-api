<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_no',
        'attribute_name',
        'attribute_value',
        'remarks',
        'is_deleted',
    ];

    public function product_attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'attribute_id', 'id');
    }
}
