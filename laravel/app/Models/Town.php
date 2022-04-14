<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postal_code',
    ];


    function address()
    {
        return $this->hasMany(Address::class);
    }
}
