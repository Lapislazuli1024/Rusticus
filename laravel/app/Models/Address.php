<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'town_id',
    ];

    function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    function town()
    {
        return $this->belongsTo(Town::class);
    }
}
