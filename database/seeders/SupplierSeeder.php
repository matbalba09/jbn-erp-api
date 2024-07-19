<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Supplier;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::truncate();
        Supplier::insert([
            [
                'name' => 'Nicolette Printing',
                'email' => 'nicprint@gmail.com',
                'address' => 'test_address_01',
                'contact_no' => '09550000001',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'Ivan Publishing',
                'email' => 'ivan@gmail.com',
                'address' => 'test_address_02',
                'contact_no' => '09550000002',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'Gain Trading',
                'email' => 'gaintrading@gmail.com',
                'address' => 'test_address_03',
                'contact_no' => '09550000003',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'Kars Printing Inc.',
                'email' => 'karsprints@gmail.com',
                'address' => 'test_address_04',
                'contact_no' => '09550000004',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
