<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemQty extends Model
{
    

    protected $fillable = ['item_id','date', 'size_id', 'qty', 'transection_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function size()
    {
        return $this->belongsTo(ItemSize::class);
    }

    public function transection()
    {
        return $this->belongsTo(TransectionType::class);
    }

}
