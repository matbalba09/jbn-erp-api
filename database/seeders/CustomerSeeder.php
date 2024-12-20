<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Customer;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::truncate();
        Customer::insert([
            [
                'customer_no' => 'CUS240727-SR-001',
                'company' => 'Our Lady OLAC',
                'contact_person' => 'Navi Gates',
                'contact_no' => '09170000001',
                'status' => 'test_status',
                'address' => 'Tanauan City, Batangas',
                'entry_by' => 1,
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'customer_no' => 'CUS240727-SR-002',
                'company' => 'Magnolia',
                'contact_person' => 'John Blue',
                'contact_no' => '09170000002',
                'status' => 'test_status',
                'address' => 'Metro Manila',
                'entry_by' => 2,
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'customer_no' => 'CUS240727-SR-003',
                'company' => 'BINI PH',
                'contact_person' => 'Ivan Matthew E. Ferrer',
                'contact_no' => '09170000003',
                'status' => 'test_status',
                'address' => 'Bagumbayan Tanauan City',
                'entry_by' => 1,
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'customer_no' => 'CUS240727-SR-004',
                'company' => 'Zhi Yi Technologies',
                'contact_person' => 'Shaila Gain Madrid',
                'contact_no' => '09170000004',
                'status' => 'test_status',
                'address' => 'Sto.Tomas Batangas',
                'entry_by' => 1,
                'entry_date' => Helper::getDateNow(),
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
