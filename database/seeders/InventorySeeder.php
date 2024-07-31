<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Inventory;
use App\Models\InventoryTransaction;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::truncate();
        Inventory::insert([
            [
                'stock_no' => 'test_stock_no_01',
                'item_code' => '00100258912',
                'item_name' => 'test_item_name_01',
                'reorder_level' => 'test_reorder_level_01',
                'qty_on_hand' => 100,
                'reorder_qty' => 500,
                'item_type' => 'test_item_type_01',
                'uom' => 'PCS',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'stock_no' => 'test_stock_no_02',
                'item_code' => '00276089235',
                'item_name' => 'test_item_name_02',
                'reorder_level' => 'test_reorder_level_02',
                'qty_on_hand' => 150,
                'reorder_qty' => 600,
                'item_type' => 'test_item_type_02',
                'uom' => 'PCS',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'stock_no' => 'test_stock_no_03',
                'item_code' => '00351664322',
                'item_name' => 'test_item_name_03',
                'reorder_level' => 'test_reorder_level_03',
                'qty_on_hand' => 120,
                'reorder_qty' => 540,
                'item_type' => 'test_item_type_03',
                'uom' => 'PCS',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'stock_no' => 'test_stock_no_04',
                'item_code' => '00430203847',
                'item_name' => 'test_item_name_04',
                'reorder_level' => 'test_reorder_level_04',
                'qty_on_hand' => 100,
                'reorder_qty' => 700,
                'item_type' => 'test_item_type_04',
                'uom' => 'PCS',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        InventoryTransaction::truncate();
        InventoryTransaction::insert([
            [
                'inventory_id' => 1,
                'quantity' => 500,
                'image' => 'test_image_01.jpg',
                'flow' => 'test_flow',
                'remarks' => 'test',
                'documents' => 'test.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'inventory_id' => 2,
                'quantity' => 600,
                'image' => 'test_image_02.jpg',
                'flow' => 'test_flow',
                'remarks' => 'test',
                'documents' => 'test.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'inventory_id' => 3,
                'quantity' => 540,
                'image' => 'test_image_03.jpg',
                'flow' => 'test_flow',
                'remarks' => 'test',
                'documents' => 'test.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'inventory_id' => 4,
                'quantity' => 700,
                'image' => 'test_image_04.jpg',
                'flow' => 'test_flow',
                'remarks' => 'test',
                'documents' => 'test.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
