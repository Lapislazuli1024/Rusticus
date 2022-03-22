<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_category extends Model
{
    use HasFactory;
    
    function sub_category()
    {
        return $this->hasMany(Sub_category::class);
    }
}
