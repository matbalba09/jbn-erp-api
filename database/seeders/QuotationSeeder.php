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
                'prs_id' => 1,
                'item_name' => 'Tshirt Blue Large DTF',
                'maker' => 'test maker',
                'material' => 'test material',
                'color' => 'test color',
                'size' => 'test size',
                'print' => 'test print',
                'print_size' => 'test print_size',
                'design_url' => 'test design_url',
                'remarks' => 'test remarks',
                'quantity' => 671,
                'selling_price' => 1233.75,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'quotation_no' => 'QUO240719-SR-002',
                'prs_id' => 2,
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
                'quotation_no' => 'QUO240719-SR-003',
                'prs_id' => 3,
                'item_name' => 'Tshirt Blue Small DTF',
                'maker' => 'test maker',
                'material' => 'test material',
                'color' => 'test color',
                'size' => 'test size',
                'print' => 'test print',
                'print_size' => 'test print_size',
                'design_url' => 'test design_url',
                'remarks' => 'test remarks',
                'quantity' => 222,
                'selling_price' => 1223.25,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'quotation_no' => 'QUO240719-SR-004',
                'prs_id' => 4,
                'item_name' => 'Tshirt Blue Medium DTF',
                'maker' => 'test maker',
                'material' => 'test material',
                'color' => 'test color',
                'size' => 'test size',
                'print' => 'test print',
                'print_size' => 'test print_size',
                'design_url' => 'test design_url',
                'remarks' => 'test remarks',
                'quantity' => 100,
                'selling_price' => 1234.00,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
