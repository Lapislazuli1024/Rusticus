<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webpage extends Model
{
    use HasFactory;

    function farmer()
    {
        return $this->hasOne(Farmer::class);
    }
}
