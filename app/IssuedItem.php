<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssuedItem extends Model
{

    public function item () {
        return $this->belongsTo('App\Item');
    }

    //issuedItems should be belongs to Staff

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    //each issued line is belongs to delivery table

    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

    public function getCategory()
    {
     return $this->hasManyThrough(
        'App\Category',  //from which table, we will get data
        'App\Item',
        'id',
        'id',
        'id');
    }
}
