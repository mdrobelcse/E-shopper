<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function div()
    {
        return $this->belongsTo('App\Division');
    }
}//end class
