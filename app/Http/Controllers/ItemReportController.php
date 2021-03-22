<?php

namespace App\Http\Controllers;

use PDF;
use App\Item;
use App\Order;
use App\Store;
use App\Category;
use App\IssuedItem;
use App\ItemSummary;
use App\StoreRequestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemReportController extends Controller
{
    public function item($store)
    {

        // dump($store);

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
                ->get();

                // return $query;

            $newCollection = $query->map(function ($store){
                    return [
                         'id'=> $store->id,
                        'category' => $store->category,
                        'store_id' => $store->store_id,
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



                // return $newCollection;

                return view('reports.uniforms', ['result' => $newCollection->where('store_name' , '=', $store)]);

                // $pdf = PDF::loadView('reports.uniforms', compact('result'))->setPaper('a4', 'portrait');
    }

    public function getPdfItem()
    {

        $result = $this->getItems();

         $pdf = PDF::loadView('report1', compact('result'))->setPaper('a4', 'portrait');
        return $pdf->stream('report1.pdf');

        // $fileName = $result->item_id;
        // return $pdf->stream($fileName . '.pdf');
    }
}
