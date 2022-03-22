<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    //hasOne, hasMany, belongsTo, belongsToMany
    function customers()
    {
        return $this->hasMany(Customer::class);
    }

    function farmers()
    {
        return $this->hasMany(Farmer::class);
    }

    function admins()
    {
        return $this->hasMany(Admin::class);
    }

    function sessioncart()
    {
        return $this->hasOne(Sessioncart::class);
    }

    function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    function products()
    {
        return $this->hasMany(Product::class);
    }
}
