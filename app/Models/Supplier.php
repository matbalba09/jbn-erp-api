<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'supplier_no',
        'email',
        'address',
        'contact_no',
        'remarks',
        'is_deleted',
    ];

    public function prs_supplier()
    {
        return $this->hasOne(PrsSupplier::class, 'supplier_id');
    }
}