<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'initialQty','category_id', 'thumbnail'];

    public function order()
    {
        return $this->hasMany('App\Order');
    }

//each item is belongs to category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function store()
    {
        return $this->hasOneThrough(
                Store::class,
                Category::class,
                'store_id',
                'store_id',
                'id',
            );
    }


    public function itemQty()
    {
        return $this->hasMany(ItemQty::class);
    }

   

   public function issued_item( )
       {
            return $this->hasMany('App\IssuedItem');
       }

    public function store_request_items()
    {
        return $this->hasMany('App\StoreRequestItem');
    }

    public function itemSummary()
    {
        return $this->hasOne('App\ItemSummary');
    }

    public function itemQties()
    {
        return $this->hasMany(ItemQty::class);
    }

    public function itemSizes()
    {
        return $this->hasManyThrough(
                    ItemSize::class,
                    ItemQty::class,
                    'size_id',
                    'id',
                    'id'
        );
    }




}
