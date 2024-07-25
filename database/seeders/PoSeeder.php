<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Po;
use App\Models\PoDetail;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Po::truncate();
        Po::insert([
            [
                'po_no' => 'POR240725-PR-001',
                'supplier_id' => 1,
                'order_no' => 'ORD240719-SR-001',
                'po_date' => Helper::getDateNow(),
                'status' => 'test_status',
                'remarks' => 'test',
                'ship_to' => 'test',
                'delivery_date' => Helper::getDateNowPlusOneMonth(),
                'payment_terms' => 'test',
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'po_no' => 'POR240725-PR-002',
                'supplier_id' => 2,
                'order_no' => 'ORD240719-SR-002',
                'po_date' => Helper::getDateNow(),
                'status' => 'test_status',
                'remarks' => 'test',
                'ship_to' => 'test',
                'delivery_date' => Helper::getDateNowPlusOneMonth(),
                'payment_terms' => 'test',
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'po_no' => 'POR240725-PR-003',
                'supplier_id' => 3,
                'order_no' => 'ORD240719-SR-003',
                'po_date' => Helper::getDateNow(),
                'status' => 'test_status',
                'remarks' => 'test',
                'ship_to' => 'test',
                'delivery_date' => Helper::getDateNowPlusOneMonth(),
                'payment_terms' => 'test',
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'po_no' => 'POR240725-PR-004',
                'supplier_id' => 4,
                'order_no' => 'ORD240719-SR-004',
                'po_date' => Helper::getDateNow(),
                'status' => 'test_status',
                'remarks' => 'test',
                'ship_to' => 'test',
                'delivery_date' => Helper::getDateNowPlusOneMonth(),
                'payment_terms' => 'test',
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        PoDetail::truncate();
        PoDetail::insert([
            [
                'po_no' => 'POR240725-PR-001',
                'inventory_id' => 1,
                'remarks' => 'test',
                'name' => 'test',
                'uom' => 'PCS',
                'quantity' => 100,
                'unit_price' => 10,
                'total_price' => 1000,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'po_no' => 'POR240725-PR-002',
                'inventory_id' => 2,
                'remarks' => 'test',
                'name' => 'test',
                'uom' => 'PCS',
                'quantity' => 120,
                'unit_price' => 10,
                'total_price' => 1200,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'po_no' => 'POR240725-PR-003',
                'inventory_id' => 3,
                'remarks' => 'test',
                'name' => 'test',
                'uom' => 'PCS',
                'quantity' => 150,
                'unit_price' => 10,
                'total_price' => 1500,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'po_no' => 'POR240725-PR-004',
                'inventory_id' => 4,
                'remarks' => 'test',
                'name' => 'test',
                'uom' => 'PCS',
                'quantity' => 200,
                'unit_price' => 15,
                'total_price' => 3000,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
