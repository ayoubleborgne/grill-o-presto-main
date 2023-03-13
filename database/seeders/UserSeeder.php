<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hotmail.com',
            'password' => Hash::make('admin123'),
            'type_id' => '1',
            'client_information_id' => '1'
        ]);
        User::create([
            'name' => 'Mod',
            'email' => 'mod@hotmail.com',
            'password' => Hash::make('mod123'),
            'type_id' => '2',
            'client_information_id' => '2'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@hotmail.com',
            'password' => Hash::make('user123'),
            'type_id' => '3',
            'client_information_id' => '3'
        ]);
    }
}
