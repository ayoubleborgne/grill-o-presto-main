<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    use HasFactory;


    protected $fillable = [
        'meal_id',
    ];
    public function meal()
    {
        
      return $this->belongsTo(Meal::class, 'meal_id');
    }
    static function menuItemsFull(){
      $count = Menu::all()->count();
      if($count >= 10){
        return true;
      }
      else{
        return false;
      }

    }
    static function menuItemsCount(){
      $count = Menu::all()->count();
      return $count;
    }
   
}
