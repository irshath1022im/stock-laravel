<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

protected $fillable = ['category', 'store_id'];


    //category is belogns to store
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    //category will have many items
    public function item()
    {
        return $this->hasMany('App\Item');
    }

    public function itemOrders()
    {
        return $this->hasManyThrough('App\Order', 'App\Item');
    }

    public function itemIssued()
    {
        return $this->hasManyThrough('App\IssuedItem', 'App\Item');
    }

    //item has many issuedItems, but each issuedItem is belongs to staff, to access the staff details thru item model, we have to create a hasOneThrugh ( each issuedItem should be one staff)

    public function staffIssuedItem()
    {
        return $this->hasOneThrough(
            'App\Staff',
            'App\IssuedItem',
            'staff_id',
            'id',
            'id'
          );
    }
}
