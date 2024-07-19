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
                'customer_no' => 'CM2024-00001',
                'company' => 'De La Salle',
                'contact_person' => 'Kars Ren',
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
                'customer_no' => 'CM2024-00002',
                'company' => 'Magnolia',
                'contact_person' => 'Karen Ferrer',
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
                'customer_no' => 'CM2024-00003',
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
                'customer_no' => 'CM2024-00004',
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
