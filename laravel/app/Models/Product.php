<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stock_quantity',
        'description',
        'product_hint',
        'image',
        'price',
        'user_id',
        'sub_category_id',
        'unit_of_measure_id',
    ];

    function reservation_has_product()
    {
        return $this->hasMany(Reservation_has_product::class);
    }

    function session_has_product()
    {
        return $this->hasMany(Session_has_product::class);
    }

    function sub_category()
    {
        return $this->belongsTo(Sub_category::class);
    }

    function unit_of_measure()
    {
        return $this->belongsTo(Unit_of_measure::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
