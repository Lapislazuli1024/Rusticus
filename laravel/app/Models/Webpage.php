<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webpage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'webpage_url'
    ];

    function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
