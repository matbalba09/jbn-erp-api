<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Payment;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::truncate();
        Payment::insert([
            [
                'order_no' => 'ORD240719-SR-001',
                'issued_date' => Helper::getDateNow(),
                'ref_no' => 'test',
                'paid_date' => Helper::getDateNowPlusOneMonth(),
                'payment_method' => 'test',
                'amount' => 500,
                'description' => 'test',
                'documents' => 'test_document.jpg',
                'status' => 'test_status',
                'check_no' => 'test_check_no',
                'bank_name' => 'test_bank_name',
                'verified' => Response::TRUE,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-002',
                'issued_date' => Helper::getDateNow(),
                'ref_no' => 'test',
                'paid_date' => Helper::getDateNowPlusOneMonth(),
                'payment_method' => 'test',
                'amount' => 600,
                'description' => 'test',
                'documents' => 'test_document.jpg',
                'status' => 'test_status',
                'check_no' => 'test_check_no',
                'bank_name' => 'test_bank_name',
                'verified' => Response::TRUE,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-003',
                'issued_date' => Helper::getDateNow(),
                'ref_no' => 'test',
                'paid_date' => Helper::getDateNowPlusOneMonth(),
                'payment_method' => 'test',
                'amount' => 700,
                'description' => 'test',
                'documents' => 'test_document.jpg',
                'status' => 'test_status',
                'check_no' => 'test_check_no',
                'bank_name' => 'test_bank_name',
                'verified' => Response::TRUE,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'order_no' => 'ORD240719-SR-004',
                'issued_date' => Helper::getDateNow(),
                'ref_no' => 'test',
                'paid_date' => Helper::getDateNowPlusOneMonth(),
                'payment_method' => 'test',
                'amount' => 800,
                'description' => 'test',
                'documents' => 'test_document.jpg',
                'status' => 'test_status',
                'check_no' => 'test_check_no',
                'bank_name' => 'test_bank_name',
                'verified' => Response::TRUE,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
