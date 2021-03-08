<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //staff may receive many items from store

    public function issuedItems()
    {
        return $this->hasMany('App\IssuedItem');
    }


}
