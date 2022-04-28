<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Farmer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'webpage_id',
        'address_id'
    ];

    //hasOne, hasMany, belongsTo, belongsToMany
    function user()
    {
        return $this->belongsTo(User::class);
    }

    function address()
    {
        return $this->belongsTo(Address::class);
    }

    function webpage()
    {
        return $this->belongsTo(Webpage::class);
    }
}
