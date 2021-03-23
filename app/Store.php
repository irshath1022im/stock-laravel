<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    public $fillable = ['name', 'coverPicture'];
    //each store has many category
    public function category()
    {
        return $this->hasMany('App\Category');
    }

    public function categoryItems()
        {
            return $this->hasManyThrough('App\Item', 'App\Category');
        }


    

}
