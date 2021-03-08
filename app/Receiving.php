<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{

    protected $fillable = ['receiving_date', 'supplier', 'created_at', 'updated_at'];

    public function orders ()
    {
        return $this->hasMany('App\Order');
    }

}


