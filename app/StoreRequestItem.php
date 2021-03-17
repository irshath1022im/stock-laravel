<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreRequestItem extends Model
{
    protected $fillable = ['store_request_id', 'item_id','qty','remark'];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

}
