<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    function reservation_has_product()
    {
        return $this->hasMany(Reservation_has_product::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
