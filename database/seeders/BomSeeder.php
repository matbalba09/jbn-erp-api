<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Bom;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bom::truncate();
        Bom::insert([
            [
                'product_id' => 1,
                'inventory_id' => 1,
                'quantity' => 600,
                'uom' => 'PCS',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_id' => 2,
                'inventory_id' => 2,
                'quantity' => 750,
                'uom' => 'PCS',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_id' => 3,
                'inventory_id' => 3,
                'quantity' => 660,
                'uom' => 'PCS',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_id' => 4,
                'inventory_id' => 4,
                'quantity' => 800,
                'uom' => 'PCS',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
