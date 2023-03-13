<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */

  protected $fillable = [
    'name',
    'email',
    'password',
    'type_id',
    'client_information_id',
    'address',
    'city',
    'phone_number',
    'zip_code'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function orders(){
    return $this->hasMany(Order::class,'user_id');
  }

  public function type()
  {
    return $this->belongsTo(Type::class);
  }
  public function client_information()
  {
    return $this->belongsTo(Client_information::class);
  }

  public function isAdmin()
  {
    return ($this->type->name == "Admin");
  }

  public function isMod()
  {
    return ($this->type->name == "Mod");
  }

  public function isUser()
  {
    return ($this->type->name == "User");
  }
}
