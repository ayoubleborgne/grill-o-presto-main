<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Admin',
        ]);
        Type::create([
            'name' => 'Mod',
        ]);
        Type::create([
            'name' => 'User',
        ]);
    }
}
