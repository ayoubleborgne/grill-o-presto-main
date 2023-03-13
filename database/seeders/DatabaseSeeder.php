<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusSeeder::class,
            TypeSeeder::class,
            Client_informationSeeder::class,
            UserSeeder::class,
            MealSeeder::class,
            TagSeeder::class,
            OrderSeeder::class,
            Meal_orderSeeder::class,
            Meal_tagSeeder::class,
            MenuSeeder::class,

        ]);
    }
}
