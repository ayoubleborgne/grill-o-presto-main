<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'zip_code',
        'phone_number',
        'portions',
        'restriction',
   
    ];

    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsto(Status::class);
    }

}
