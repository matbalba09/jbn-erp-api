<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::truncate();
        Order::insert([
            [
                'customer_id' => 1,
                'quotation_no' => 'QUO240719-SR-001',
                'status' => 'test_status',
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'entry_by' => 'test_entry',
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'order_no' => 'ORD240719-SR-001',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'customer_id' => 2,
                'quotation_no' => 'QUO240719-SR-002',
                'status' => 'test_status',
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'entry_by' => 'test_entry',
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'order_no' => 'ORD240719-SR-002',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'customer_id' => 3,
                'quotation_no' => 'QUO240719-SR-003',
                'status' => 'test_status',
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'entry_by' => 'test_entry',
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'order_no' => 'ORD240719-SR-003',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'customer_id' => 4,
                'quotation_no' => 'QUO240719-SR-004',
                'status' => 'test_status',
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'entry_by' => 'test_entry',
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'order_no' => 'ORD240719-SR-004',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        OrderDetail::truncate();
        OrderDetail::insert([
            [
                'order_no' => 'ORD240719-SR-001',
                'product_id' => 1,
                'uom' => 'PCS',
                'quantity' => 150,
                'unit_price' => 10.5,
                'total_price' => 1575,
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-002',
                'product_id' => 2,
                'uom' => 'PCS',
                'quantity' => 100,
                'unit_price' => 10.5,
                'total_price' => 1050,
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-003',
                'product_id' => 3,
                'uom' => 'PCS',
                'quantity' => 150,
                'unit_price' => 10,
                'total_price' => 1500,
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-004',
                'product_id' => 4,
                'uom' => 'PCS',
                'quantity' => 120,
                'unit_price' => 10.5,
                'total_price' => 1260,
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
