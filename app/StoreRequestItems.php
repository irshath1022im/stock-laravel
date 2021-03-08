<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreRequestItems extends Model
{
    protected $fillable = ['store_request_id', 'item_id','qty'];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

}
