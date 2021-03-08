<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['date', 'name'];

    //each delivery will have many issued items

    public function issued_items()
    {
        return $this->hasMany('App\IssuedItem');
    }

}
