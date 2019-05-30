<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product')->orderBy('id','desc');
    }

    public function scopeGroupitem($query)
    {
        return $query->where('slug','mens')
                      ->orWhere('slug','womens')
                      ->orWhere('slug','shoes')
                      ->orWhere('slug','begs');
    }

    public function Fproducts()
    {
        return $this->hasMany('App\Product')
                     ->where('type','1')
                     ->orderBy('id','desc');
    }
}//end class
