<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['receiving_id', 'item_id', 'qty', 'created_at', 'updated_at'];

    public function item()
    {
        return $this->belongsTo('App\Item');

    }

    public function receiving()
    {
        return $this->belongsTo('App\Receiving');
    }

}
