<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id' => '3',
            'status_id' => '1',
            'total' => '25',
            'name' => 'User',
            'city' => 'Sherbrooke',
            'email' => 'user@hotmail.com',
            'address' => '123 rue Inventée',
            'zip_code' => '1H1 0H0',
            'phone_number' => '1 (819) 456-6544',
            'restriction' => 'Pas de peanut par pitié',
            'portions' => '5',

        ]);
        Order::create([
            'user_id' => '3',
            'status_id' => '2',
            'total' => '36',
            'name' => 'User',
            'city' => 'Sherbrooke',
            'email' => 'user@hotmail.com',
            'address' => '123 rue Inventée',
            'zip_code' => '1H1 0H0',
            'phone_number' => '1 (819) 456-6544',
            'restriction' => 'Pas de crevettes',
            'portions' => '4',

        ]);
        Order::create([
            'user_id' => '3',
            'status_id' => '3',
            'total' => '92.95',
            'name' => 'User',
            'city' => 'Sherbrooke',
            'email' => 'user@hotmail.com',
            'address' => '123 rue Inventée',
            'zip_code' => '1H1 0H0',
            'phone_number' => '1 (819) 456-6544',
            'restriction' => 'Pas de viande',
            'portions' => '2',

        ]);
    }
}
