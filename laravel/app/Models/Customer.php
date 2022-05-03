<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
    ];


    //hasOne, hasMany, belongsTo, belongsToMany
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
