<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'name',
        'email',
        'password'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    function customer()
    {
        return $this->hasOne(Customer::class);
    }

    function farmer()
    {
        return $this->hasOne(Farmer::class);
    }

    function admin()
    {
        return $this->hasOne(Admin::class);
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
