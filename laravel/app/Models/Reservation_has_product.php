<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_has_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'pickup_date',
        'product_id',
        'reservation_id',
    ];

    function product()
    {
        return $this->belongsTo(Product::class);
    }

    function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
