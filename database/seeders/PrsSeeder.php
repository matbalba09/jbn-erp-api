<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\ItemRequisition;
use App\Models\Prs;
use App\Models\PrsDetail;
use App\Models\PrsSupplier;
use App\Models\PrsSupplierItem;
use App\Models\PrsV2;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrsV2::truncate();
        PrsV2::insert([
            [
                'prs_no' => 'PRS240719-SR-001',
                'customer_id' => 1,
                'prs_date' => Helper::getDateNow(),
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'approved_by' => 1,
                'requested_by' => 2,
                'remarks' => 'remarks',
                'discount_price' => 150,
                'status' => 'status',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_no' => 'PRS240719-SR-002',
                'customer_id' => 1,
                'prs_date' => Helper::getDateNow(),
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'approved_by' => 1,
                'requested_by' => 2,
                'remarks' => 'remarks',
                'discount_price' => 250,
                'status' => 'status',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_no' => 'PRS240719-SR-003',
                'customer_id' => 1,
                'prs_date' => Helper::getDateNow(),
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'approved_by' => 1,
                'requested_by' => 2,
                'remarks' => 'remarks',
                'discount_price' => 125,
                'status' => 'status',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_no' => 'PRS240719-SR-004',
                'customer_id' => 1,
                'prs_date' => Helper::getDateNow(),
                'due_date' => Helper::getDateNowPlusOneMonth(),
                'approved_by' => 1,
                'requested_by' => 2,
                'remarks' => 'remarks',
                'discount_price' => 115,
                'status' => 'status',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        ItemRequisition::truncate();
        ItemRequisition::insert([
            [
                'prs_id' => 1,
                'item_name' => 'item_name_01',
                'maker' => 'maker_01',
                'material' => 'material_01',
                'color' => 'red',
                'size' => 'test',
                'print' => 'test',
                'print_size' => 'test',
                'design_url' => 'test',
                'remarks' => 'remarks',
                'quantity' => 100,
                'selling_price' => 100,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_id' => 2,
                'item_name' => 'item_name_02',
                'maker' => 'maker_02',
                'material' => 'material_02',
                'color' => 'red',
                'size' => 'test',
                'print' => 'test',
                'print_size' => 'test',
                'design_url' => 'test',
                'remarks' => 'remarks',
                'quantity' => 100,
                'selling_price' => 150,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_id' => 3,
                'item_name' => 'item_name_03',
                'maker' => 'maker_03',
                'material' => 'material_03',
                'color' => 'red',
                'size' => 'test',
                'print' => 'test',
                'print_size' => 'test',
                'design_url' => 'test',
                'remarks' => 'remarks',
                'quantity' => 100,
                'selling_price' => 125,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_id' => 4,
                'item_name' => 'item_name_04',
                'maker' => 'maker_04',
                'material' => 'material_04',
                'color' => 'red',
                'size' => 'test',
                'print' => 'test',
                'print_size' => 'test',
                'design_url' => 'test',
                'remarks' => 'remarks',
                'quantity' => 100,
                'selling_price' => 115,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
