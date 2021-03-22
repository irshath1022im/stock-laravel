<?php

namespace App\Http\Livewire;

use App\Item;
use App\Order;
use App\IssuedItem;
use Livewire\Component;
use App\StoreRequestItem;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ItemsLivewire extends Component
{
        use WithPagination;

       protected $paginationTheme = 'bootstrap';
       public $sortBy= 'id';
       public $searchValue;
       public $searchByItem_name;
       public $sortDirection = 'asc';

       public $perPage = 10;



    // public function searchValue()
    // {
    //     return $this->searchValue = ''
    // }

    public function orderBy($inputValue)
    {
        $this->searchValue = $inputValue;
    }


    public function render()
    {

           // $query = ItemSummary::
           //         select('item_id','totalReceived','totalIssued',DB::Raw('totalReceived -totalIssued as Balance'))
           //         ->addSelect(['item_name' => Item::select('name')
           //                     ->whereColumn('id', 'item_summaries.item_id')
           //                     ]);

       //     $query = DB::table('item_summaries')
       //                      ->select('item_id','totalReceived','totalIssued',
       //                                 DB::Raw('totalReceived -totalIssued as Balance'))
       //                     ->addSelect(['item_name' => DB::table('items')
       //                                 ->select('name')
       //                                 ->whereColumn('id', 'item_summaries.item_id')
       //                                  ])
       //                     ->when($searchByItem_name, function($query, $searchByItem_name){
       //                                     return $query->where('item_name','=', $searchByItem_name);
       //                                          })
       //                        ;

    //    $query = DB::table('item_summaries')
    //     ->join('items', 'item_summaries.item_id', '=', 'items.id')
    //     ->select('item_id','totalReceived','totalIssued','items.*',
    //             DB::Raw('totalReceived -totalIssued as Balance'))
    //             ->when($this->searchByItem_name, function($query, $searchByItem_name){
    //                         return $query->where('name','like', '%'.$searchByItem_name.'%');
    //                      })
    //      ;

            $sortBy = $this->sortBy;
            $sortDirection = $this->sortDirection;
            $searchByItem_name = $this->searchByItem_name;

        //  $query = DB::table('item_summaries')
        //                 ->join('items', 'item_summaries.item_id', '=', 'items.id')
        //                 ->join('categories', 'items.category_id' , '=', 'categories.id')
        //                 ->select('item_id','totalReceived','totalIssued','items.*', 'categories.category',
        //                                 DB::Raw('totalReceived -totalIssued as Balance'))
        //                 ->when($searchByItem_name, function($query, $searchByItem_name){
        //                                         return $query->where('name','like', '%'.$searchByItem_name.'%');
        //                                      })
        //                 ->when( $this->sortBy, function($query) use($sortBy, $sortDirection) {
        //                             return $query->orderBy($sortBy, $sortDirection);
        //                             })
        //                 ;
        //                 // ->appends($request->except('page'))

        // $result = $query->paginate($this->perPage);

        $query = Item::
            addSelect([
            'issuedQty' => StoreRequestItem::select( DB::Raw('SUM(qty)'))
                ->groupBy('item_id')
                ->whereColumn('item_id', 'items.id')
                ])
            ->addSelect([
                'receivedQty' => Order::select( DB::Raw('SUM(qty)'))
                    ->groupBy('item_id')
                    ->whereColumn('item_id', 'items.id')
                    ])
            ->when($searchByItem_name, function($query, $searchByItem_name){
                            return $query->where('name','like', '%'.$searchByItem_name.'%');
                            })
             ->get();



            $query->map(function ($item){
               return $item->balance = ($item->initialQty +$item->receivedQty) - $item->issuedQty ;
                 });



        return view('livewire.items-livewire', [
            "items" => $query])->extends('layout');
    }


}
