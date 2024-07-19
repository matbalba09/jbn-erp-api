<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quotation::truncate();
        Quotation::insert([
            [
                'prs_no' => 'PRS240719-SR-001',
                'quotation_date' => Helper::getDateNow(),
                'description' => 'test_description',
                'valid_until' => Helper::getDateNow(),
                'total_price' => 1575,
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test_receiver',
                'remarks' => 'test',
                'status' => 'test_status',
                'quotation_no' => 'QUO240719-SR-001',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_no' => 'PRS240719-SR-002',
                'quotation_date' => Helper::getDateNow(),
                'description' => 'test_description',
                'valid_until' => Helper::getDateNow(),
                'total_price' => 1050,
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test_receiver',
                'remarks' => 'test',
                'status' => 'test_status',
                'quotation_no' => 'QUO240719-SR-002',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_no' => 'PRS240719-SR-003',
                'quotation_date' => Helper::getDateNow(),
                'description' => 'test_description',
                'valid_until' => Helper::getDateNow(),
                'total_price' => 1500,
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test_receiver',
                'remarks' => 'test',
                'status' => 'test_status',
                'quotation_no' => 'QUO240719-SR-003',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'prs_no' => 'PRS240719-SR-004',
                'quotation_date' => Helper::getDateNow(),
                'description' => 'test_description',
                'valid_until' => Helper::getDateNow(),
                'total_price' => 1260,
                'requested_by' => 2,
                'approved_by' => 1,
                'received_by' => 'test_receiver',
                'remarks' => 'test',
                'status' => 'test_status',
                'quotation_no' => 'QUO240719-SR-004',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        QuotationDetail::truncate();
        QuotationDetail::insert([
            [
                'quotation_no' => 'QUO240719-SR-001',
                'product_id' => 1,
                'name' => 'Tshirt Blue Large DTF',
                'uom' => 'PCS',
                'quantity' => 150,
                'unit_price' => 10.5,
                'total_price' => 1575,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'quotation_no' => 'QUO240719-SR-002',
                'product_id' => 2,
                'name' => 'Tshirt Black Large DTF',
                'uom' => 'PCS',
                'quantity' => 100,
                'unit_price' => 10.5,
                'total_price' => 1050,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'quotation_no' => 'QUO240719-SR-003',
                'product_id' => 3,
                'name' => 'Tshirt Red Large DTF',
                'uom' => 'PCS',
                'quantity' => 150,
                'unit_price' => 10,
                'total_price' => 1500,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'quotation_no' => 'QUO240719-SR-004',
                'product_id' => 4,
                'name' => 'Tshirt Pink Large DTF',
                'uom' => 'PCS',
                'quantity' => 120,
                'unit_price' => 10.5,
                'total_price' => 1260,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
