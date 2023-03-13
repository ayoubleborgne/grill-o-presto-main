<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Meal_tagSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('meal_tag')->insert([
         'tag_id' => ('1'),
         'meal_id' => ('4')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('2'),
         'meal_id' => ('4')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('3'),
         'meal_id' => ('4')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('2'),
         'meal_id' => ('2')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('2'),
         'meal_id' => ('3')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('2'),
         'meal_id' => ('5')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('3'),
         'meal_id' => ('5')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('2'),
         'meal_id' => ('8')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('3'),
         'meal_id' => ('7')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('3'),
         'meal_id' => ('9')
      ]);
      DB::table('meal_tag')->insert([
         'tag_id' => ('1'),
         'meal_id' => ('11')
      ]);
   }
}
