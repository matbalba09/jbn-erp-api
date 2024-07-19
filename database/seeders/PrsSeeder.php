<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Prs;
use App\Models\PrsDetail;
use App\Models\PrsSupplier;
use App\Models\PrsSupplierItem;
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
        Prs::truncate();
        Prs::insert([
            [
                'prs_date' => Helper::getDateNow(),
                'customer_id' => 1,
                'requested_by' => 2,
                'approved_by' => 1,
                'remarks' => 'test',
                'status' => 'test_status',
                'prs_no' => 'PRS240719-SR-001',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_date' => Helper::getDateNow(),
                'customer_id' => 2,
                'requested_by' => 2,
                'approved_by' => 1,
                'remarks' => 'test',
                'status' => 'test_status',
                'prs_no' => 'PRS240719-SR-002',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_date' => Helper::getDateNow(),
                'customer_id' => 3,
                'requested_by' => 2,
                'approved_by' => 1,
                'remarks' => 'test',
                'status' => 'test_status',
                'prs_no' => 'PRS240719-SR-003',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_date' => Helper::getDateNow(),
                'customer_id' => 4,
                'requested_by' => 2,
                'approved_by' => 1,
                'remarks' => 'test',
                'status' => 'test_status',
                'prs_no' => 'PRS240719-SR-004',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        PrsDetail::truncate();
        PrsDetail::insert([
            [
                'prs_id' => 1,
                'product_id' => 1,
                'name' => 'test_prs_name_01',
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
                'prs_id' => 2,
                'product_id' => 2,
                'name' => 'test_prs_name_02',
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
                'prs_id' => 3,
                'product_id' => 3,
                'name' => 'test_prs_name_03',
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
                'prs_id' => 4,
                'product_id' => 4,
                'name' => 'test_prs_name_04',
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

        PrsSupplier::truncate();
        PrsSupplier::insert([
            [
                'prs_detail_id' => 1,
                'supplier_id' => 1,
                'name' => 'Nicolette Printing',
                'uom' => 'PCS',
                'quantity' => 150,
                'unit_price' => 10.5,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_detail_id' => 2,
                'supplier_id' => 2,
                'name' => 'Ivan Publishing',
                'uom' => 'PCS',
                'quantity' => 100,
                'unit_price' => 10.5,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_detail_id' => 3,
                'supplier_id' => 3,
                'name' => 'Gain Trading',
                'uom' => 'PCS',
                'quantity' => 150,
                'unit_price' => 10,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_detail_id' => 4,
                'supplier_id' => 4,
                'name' => 'Kars Printing Inc.',
                'uom' => 'PCS',
                'quantity' => 120,
                'unit_price' => 10.5,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        PrsSupplierItem::truncate();
        PrsSupplierItem::insert([
            [
                'prs_supplier_id' => 1,
                'bom_id' => 1,
                'uom' => 'PCS',
                'quantity' => 150,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_supplier_id' => 2,
                'bom_id' => 2,
                'uom' => 'PCS',
                'quantity' => 100,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_supplier_id' => 3,
                'bom_id' => 3,
                'uom' => 'PCS',
                'quantity' => 150,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_supplier_id' => 4,
                'bom_id' => 4,
                'uom' => 'PCS',
                'quantity' => 120,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
