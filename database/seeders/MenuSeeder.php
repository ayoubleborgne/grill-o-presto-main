<?php

namespace Database\Seeders;

use App\Models\Menu;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'meal_id' => ('1')
        ]);
        Menu::create([
            'meal_id' => ('2')
        ]);
        Menu::create([
            'meal_id' => ('3')
        ]);
        Menu::create([
            'meal_id' => ('4')
        ]);
        Menu::create([
            'meal_id' => ('5')
        ]);
        Menu::create([
            'meal_id' => ('6')
        ]);
        Menu::create([
            'meal_id' => ('7')
        ]);
        Menu::create([
            'meal_id' => ('8')
        ]);
        Menu::create([
            'meal_id' => ('9')
        ]);
        Menu::create([
            'meal_id' => ('10')
        ]);
    }
}
