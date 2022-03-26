<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessioncart extends Model
{
    use HasFactory;

    function session_has_product()
    {
        return $this->hasMany(Session_has_product::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
