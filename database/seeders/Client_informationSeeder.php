<?php

namespace Database\Seeders;

use App\Models\Client_information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Client_informationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client_information::create([
            'phone_number' => '1 (819) 456-6544',
            'address' => 'Addresse admin',
            'zip_code' => 'J1H 2H2',
            'city' => 'ADMIN CITY',
        ]);

        Client_information::create([
            'phone_number' => '1 (819) 456-6544',
            'address' => 'Addresse mod',
            'zip_code' => 'J1H 3H3',
            'city' => 'MOD CITY',
        ]);

        Client_information::create([
            'phone_number' => '1 (819) 456-6544',
            'address' => '123 Fausse rue.',
            'zip_code' => 'J1H 1H1',
            'city' => 'Sherbrooke,QC',
        ]);
    }
}
