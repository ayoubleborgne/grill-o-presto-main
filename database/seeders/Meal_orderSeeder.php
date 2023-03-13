<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Meal_orderSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('meal_order')->insert([
         'order_id' => ('1'),
         'meal_id' => ('1'),
         'created_at' => Carbon::now(),
      ]);
      DB::table('meal_order')->insert([
         'order_id' => ('1'),
         'meal_id' => ('2'),
         'created_at' => Carbon::now(),
      ]);
      DB::table('meal_order')->insert([
         'order_id' => ('1'),
         'meal_id' => ('3'),
         'created_at' => Carbon::now(),
      ]);

      DB::table('meal_order')->insert([
         'order_id' => ('2'),
         'meal_id' => ('4'),
         'created_at' => Carbon::now(),
      ]);
      DB::table('meal_order')->insert([
         'order_id' => ('2'),
         'meal_id' => ('5'),
         'created_at' => Carbon::now(),
      ]);
      DB::table('meal_order')->insert([
         'order_id' => ('2'),
         'meal_id' => ('6'),
         'created_at' => Carbon::now(),
      ]);

      DB::table('meal_order')->insert([
         'order_id' => ('3'),
         'meal_id' => ('7'),
         'created_at' => Carbon::now(),
      ]);
      DB::table('meal_order')->insert([
         'order_id' => ('3'),
         'meal_id' => ('8'),
         'created_at' => Carbon::now(),
      ]);
      DB::table('meal_order')->insert([
         'order_id' => ('3'),
         'meal_id' => ('9'),
         'created_at' => Carbon::now(),
      ]);
   }
}
