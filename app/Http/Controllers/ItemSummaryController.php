<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\ItemSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ItemSummaryController extends Controller
{
     //get all items summary


     public function getSummary(Request $request)
     {
         $searchByItem_name = $request->searchByItem_name;
         $sortBy = $request->sortBy ? $request->sortBy : 'id';
         $sortDirection = $request->sortDirection ? $request->sortDirection : 'asc';
         $perPage = $request->perPage ? $request->perPage : 5;

        // $query = DB::table('item_summaries')
        //      ->join('items', 'item_summaries.item_id', '=', 'items.id')
        //      ->join('categories', 'items.category_id' , '=', 'categories.id')
        //     ->select('item_id','totalReceived','totalIssued','items.*', 'categories.category',
        //         DB::Raw('totalReceived -totalIssued as Balance'))
        //         ->when($searchByItem_name, function($query, $searchByItem_name){
        //                     return $query->where('name','like', '%'.$searchByItem_name.'%');
        //                  })
        //         ->when( $sortBy, function($query) use($sortBy, $sortDirection) {
        //             return $query->orderBy($sortBy, $sortDirection);
        //              })
        //  ;

        $query = Item::with(['order' => function($query){
                            return $query->select('item_id', DB::Raw('sum(qty) as totalReceived'))
                                        ->groupBy('item_id');
                                }])

                        ->with(['store_request_items' => function($query)
                                {
                                    return $query->select('item_id', DB::Raw('sum(qty) as totalIssued'))
                                                 ->groupBy('item_id');
                                }])
                        ->when( $sortBy != 'balance', function($query) use($sortBy, $sortDirection) {
                             return $query->orderBy($sortBy, $sortDirection);
                             })
                        ->get();

                // return $query;
                $newItemSummary = [];

                        foreach ($query as $key => $item) {
                            $item = [
                                'item_id' => $item->id,
                                'item_name' => $item->name,
                                'initialQty' => $item->initialQty,
                                'totalReceived' => count($item->order) > 0 ? $item->order[0]['totalReceived'] : 0,
                                'totalIssued' => count($item->store_request_items) > 0 ? $item->store_request_items[0]['totalIssued'] : 0,
                                'balance' => $item->initialQty + ( count($item->order) > 0 ? $item->order[0]['totalReceived'] : 0 ) - (count($item->store_request_items) > 0 ? $item->store_request_items[0]['totalIssued'] : 0 )
                            ];

                            array_push( $newItemSummary, $item );
                        }

                // return $newItemSummary;

                $newCollection = collect($newItemSummary);

                    // dump($newCollection);
                    // dump($searchByItem_name);

              $newCollection->when($searchByItem_name, function($query, $searchByItem_name){
                    // return $query->where('item_name','like', '%'.$searchByItem_name.'%');
                                 return $query->where('item_name', $searchByItem_name);
                              });

             $sorted = $newCollection->when($sortBy === 'balance', function($query){
                 return $query->sortByDesc('balance');
             });

               $result =  $newCollection->all();

               return response()->json($result, 200);

        //  $result = DB::table('items')
        //         ->leftJoin('store_request_items', 'items.id', '=', 'store_request_items.item_id')
        //         ->addSelect(['totalIssued' => DB::table('store_request_items')
        //                         ->select(DB::Raw('sum(qty) as totalissued'))
        //                         ->groupBy('item_id')
        //                         ->whereColumn('item_id', '=', 'items.id')
        //         ])
        //         ->distinct()
        //         ->get()
        //          ;



    //   $result = $query->paginate($perPage)->appends($request->except('page'));
            //   dump($result);
    //   return $result;
     }

}
