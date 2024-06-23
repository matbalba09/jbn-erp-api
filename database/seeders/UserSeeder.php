<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Role;
use App\Models\User;
use App\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $adminRole = Role::find(1);
        $salesRole = Role::find(2);
        $procurementRole = Role::find(3);

        User::insert([
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'sales',
                'username' => 'sales',
                'email' => 'sales@gmail.com',
                'password' => Hash::make('sales'),
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'procurement',
                'username' => 'procurement',
                'email' => 'procurement@gmail.com',
                'password' => Hash::make('procurement'),
                'is_deleted' => Response::FALSE,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);

        $users = User::all();
        $adminUser = $users->first();
        $salesUser = $users->skip(1)->first();
        $procurementUser = $users->last();

        $adminUser->roles()->attach($adminRole);
        // $adminUser->roles()->attach([$adminRole->id, $salesRole->id, $procurementRole->id]);
        // $adminUser->roles()->attach($salesRole);
        // $adminUser->roles()->attach($procurementRole);

        $salesUser->roles()->attach($salesRole);
        $procurementUser->roles()->attach($procurementRole);
    }
}