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
                'item_name' => 'Tshirt Blue Extra Small DTF',
                'maker' => 'test maker',
                'material' => 'test material',
                'color' => 'test color',
                'size' => 'test size',
                'print' => 'test print',
                'print_size' => 'test print_size',
                'design_url' => 'test design_url',
                'remarks' => 'test remarks',
                'quantity' => 241,
                'selling_price' => 1231.50,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-002',
                'item_name' => 'Tshirt Blue Extra Small DTF',
                'maker' => 'test maker',
                'material' => 'test material',
                'color' => 'test color',
                'size' => 'test size',
                'print' => 'test print',
                'print_size' => 'test print_size',
                'design_url' => 'test design_url',
                'remarks' => 'test remarks',
                'quantity' => 241,
                'selling_price' => 1231.50,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-003',
                'item_name' => 'Tshirt Blue Extra Small DTF',
                'maker' => 'test maker',
                'material' => 'test material',
                'color' => 'test color',
                'size' => 'test size',
                'print' => 'test print',
                'print_size' => 'test print_size',
                'design_url' => 'test design_url',
                'remarks' => 'test remarks',
                'quantity' => 241,
                'selling_price' => 1231.50,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-004',
                'item_name' => 'Tshirt Blue Extra Small DTF',
                'maker' => 'test maker',
                'material' => 'test material',
                'color' => 'test color',
                'size' => 'test size',
                'print' => 'test print',
                'print_size' => 'test print_size',
                'design_url' => 'test design_url',
                'remarks' => 'test remarks',
                'quantity' => 241,
                'selling_price' => 1231.50,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
