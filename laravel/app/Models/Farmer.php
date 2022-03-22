<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    //hasOne, hasMany, belongsTo, belongsToMany
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function adress()
    {
        return $this->hasOne(Adress::class);
    }
    function webpage()
    {
        return $this->belongsTo(Webpage::class);
    }
}
