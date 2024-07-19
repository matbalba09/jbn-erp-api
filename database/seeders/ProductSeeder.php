<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Product;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();
        Product::insert([
            [
                'product_no' => 'PRD240705-AD-001',
                'name' => 'Tshirt Blue Large DTF',
                'description' => 'test_description',
                'price' => 250.00,
                'status' => 'ACTIVE',
                'remarks' => 'test',
                'image' => 'test_image_01.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_no' => 'PRD240705-AD-002',
                'name' => 'Tshirt Black Large DTF',
                'description' => 'test_description',
                'price' => 200.00,
                'status' => 'ACTIVE',
                'remarks' => 'test',
                'image' => 'test_image_02.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_no' => 'PRD240705-AD-003',
                'name' => 'Tshirt Red Large DTF',
                'description' => 'test_description',
                'price' => 200.00,
                'status' => 'ACTIVE',
                'remarks' => 'test',
                'image' => 'test_image_03.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_no' => 'PRD240705-AD-004',
                'name' => 'Tshirt Pink Large DTF',
                'description' => 'test_description',
                'price' => 300.00,
                'status' => 'ACTIVE',
                'remarks' => 'test',
                'image' => 'test_image_04.jpg',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
