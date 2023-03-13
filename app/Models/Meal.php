<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
  use SoftDeletes;
  use HasFactory;
  protected $fillable = [
    'name',
    'description',
    'price'
  ];
  public function menus()
  {
    return $this->hasMany(Menu::class, 'meal_id');
  }
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }


  public function orders()
  {
    return $this->belongsToMany(Order::class);
  }
}
