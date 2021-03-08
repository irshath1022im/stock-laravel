<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreRequest extends Model
{
    //
    protected $fillable = ['requesting_date', 'staff_id', 'status'];


    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function requested_items()
    {
        return $this->hasMany('App\StoreRequestItems');
    }

}
