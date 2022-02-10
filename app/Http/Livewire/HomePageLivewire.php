<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Store;
use App\Category;
use App\StoreRequestItem;
use App\Order;
use Illuminate\Support\Facades\DB;

class HomePageLivewire extends Component

{

    public $selectedStore= 1;
    public $selectedCategory;
    public $stores;
    public $categories;
    public $categorySummary;


    protected $listeners = ['selectStore'];

    public function selectStore($store_id)
    {
        $this->selectedStore = $store_id;
    }


    public function clearFilter()
    {
        $this->selectedCategory = null;
    }

  

    public function render()
    {
        if($this->selectedStore){
            $this->categories = Category::where('store_id', $this->selectedStore)->get();
        }

        $query= Category::with(['item' => function($query)
        {
            return $query->addSelect([
                'issuedQty' => StoreRequestItem::select( DB::Raw('SUM(qty)'))
                    ->groupBy('item_id')
                    ->whereColumn('item_id', 'items.id')
                    ])
                ->addSelect([
                    'receivedQty' => Order::select( DB::Raw('SUM(qty)'))
                    ->groupBy('item_id')
                    ->whereColumn('item_id', 'items.id')
                    ]);
        }, 'store'
        ])
        ->when($this->selectedStore, function($query)
            {
                return $query->where('store_id', $this->selectedStore);
            })
        ->when($this->selectedCategory, function($query)
            {
                return $query->where('category', '=', $this->selectedCategory);
            })
        ->get();

        // return $query;
        // dump($query);

    $this->categorySummary = $query->map(function ($store){
            return [
                 'id'=> $store->id,
                'category' => $store->category,
                'store_id' => $store->store_id,
                'coverPicture' => $store->coverPicture,
                'items' => $store->item->map( function ($item) {
                    return [
                        'id' =>$item->id,
                        'name' => $item->name,
                        'initialQty' => $item->initialQty,
                        'issuedQty' => $item->issuedQty,
                        'receivedQty' =>$item->receivedQty,
                        'balance' => $item->initialQty + $item->receivedQty - $item->issuedQty
                          ];
                     }),
                'store_name' => $store->store->name
            ];
        });
        
      
        return view('livewire.home-page-livewire')->extends('layouts.adminLayout');
    }


}
