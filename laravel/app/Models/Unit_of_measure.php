<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_of_measure extends Model
{
    use HasFactory;

    function product()
    {
        return $this->hasMany(Product::class);
    }
}
