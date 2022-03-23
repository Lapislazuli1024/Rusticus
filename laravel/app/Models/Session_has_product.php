<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_has_product extends Model
{
    use HasFactory;

    function product()
    {
        return $this->belongsTo(Product::class);
    }

    function sessioncart()
    {
        return $this->belongsTo(Sessioncart::class);
    }
}
