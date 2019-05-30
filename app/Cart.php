<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cart extends Model
{


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
