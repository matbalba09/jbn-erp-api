<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;
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

        Attribute::truncate();
        Attribute::insert([
            [
                'attribute_no' => '00139211722',
                'attribute_name' => 'test_attribute_name_01',
                'attribute_value' => 'test_attribute_value_01',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'attribute_no' => '00278311541',
                'attribute_name' => 'test_attribute_name_02',
                'attribute_value' => 'test_attribute_value_02',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'attribute_no' => '00329452073',
                'attribute_name' => 'test_attribute_name_03',
                'attribute_value' => 'test_attribute_value_03',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'attribute_no' => '00448374318',
                'attribute_name' => 'test_attribute_name_04',
                'attribute_value' => 'test_attribute_value_04',
                'remarks' => 'test',
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        ProductAttribute::truncate();
        ProductAttribute::insert([
            [
                'product_id' => 1,
                'attribute_id' => 1,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_id' => 2,
                'attribute_id' => 2,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_id' => 3,
                'attribute_id' => 3,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'product_id' => 4,
                'attribute_id' => 4,
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
