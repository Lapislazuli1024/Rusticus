<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function customers()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Customer::class);
    }
}
