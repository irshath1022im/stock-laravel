<?php

namespace App\Http\Livewire\Admin\Items;

use App\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemIndex extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {

        $result = Item::with(['category' => function($q){
            return $q->with('store');
        }, 'itemQty'])->paginate(10);
        return view('livewire.admin.items.item-index',['items' => $result])->extends('layouts.adminLayout');
    }
}
