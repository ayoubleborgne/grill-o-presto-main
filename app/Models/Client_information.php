<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_information extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number',
        'address',
        'city',
        'zip_code'
    ];



    public function user()
    {
        return $this->hasOne(User::class, 'client_information_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
