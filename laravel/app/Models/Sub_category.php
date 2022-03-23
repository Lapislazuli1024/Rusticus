<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;

    function main_category()
    {
        return $this->belongsTo(Main_category::class);
    }

    function product()
    {
        return $this->hasMany(Product::class);
    }
}
