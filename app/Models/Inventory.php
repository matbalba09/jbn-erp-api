<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_no',
        'item_code',
        'item_name',
        'reorder_level',
        'qty_on_hand',
        'reorder_qty',
        'item_type',
        'uom',
        'remarks',
        'is_deleted',
    ];

    protected $appends = ['quantity'];

    public function getQuantityAttribute()
    {
        return $this->inventory_transactions->sum('quantity');
    }

    public function bom()
    {
        return $this->hasOne(Bom::class, 'inventory_id');
    }

    public function inventory_transactions()
    {
        return $this->hasMany(InventoryTransaction::class, 'inventory_id');
    }
}
