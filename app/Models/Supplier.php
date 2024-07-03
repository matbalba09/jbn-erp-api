<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'contact_no',
        'remarks',
        'is_deleted',
    ];

    public function prs_supplier()
    {
        return $this->hasMany(PrsSupplier::class, 'supplier_id');
    }
}