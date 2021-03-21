<?php

namespace App\Http\Controllers;

use PDF;
use App\Item;
use App\Order;
use App\Store;
use App\Category;
use App\IssuedItem;
use App\ItemSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemReportController extends Controller
{
    public function item($store)
    {

        // dump($store);


        if ( $store === 'uniform') {

            // $result = Store::with(['category' => function($query){
            //     return $query->with(['item' => function($query){
            //        return $query->with(['itemSummary' => function($query){
            //            return $query->select('*',  DB::Raw('totalReceived -totalIssued as Balance'));
            //        }])->get();
            //     }])
            //            ->get();
            //    }])
            //            ->where('name', $store)
            //            ->get();

            // $query = Item::
            // addSelect([
            // 'issuedQty' => IssuedItem::select( DB::Raw('SUM(qty)'))
            //     ->groupBy('item_id')
            //     ->whereColumn('item_id', 'items.id')
            //     ])
            // ->addSelect([
            //     'receivedQty' => Order::select( DB::Raw('SUM(qty)'))
            //         ->groupBy('item_id')
            //         ->whereColumn('item_id', 'items.id')
            //         ])
            // ->get();



            // $query->map(function ($item){
            //    return $item->balance = ($item->initialQty +$item->receivedQty) - $item->issuedQty ;
            //      });

                $query= Category::with(['item'])
                ->addSelect([
                        'issuedQty' => IssuedItem::select( DB::Raw('SUM(qty)'))
                            ->groupBy('item_id')
                            ])
                ->get();

                 return $query;

            // return $result[0]->category[0]->item[0]->itemSummary;
            // return $result;

            return view('reports.uniforms', ['categories' => $query]);

                // $pdf = PDF::loadView('reports.uniforms', compact('result'))->setPaper('a4', 'portrait');
                // return $pdf->stream('reports.uniforms.pdf');
        }else {

            $result = $this->getItems($store);

            return view('reports.promotions', ['items' => $result]);

            // $pdf = PDF::loadView('reports.promotions', ['items' => $result])->setPaper('a4', 'portrait');
            // return $pdf->stream('reports.promotions.pdf');
        }



    }

    public function getItems ($store)
    {

        $result = DB::table('item_summaries')
        ->join('items', 'item_summaries.item_id', '=', 'items.id')
        ->join('categories', 'items.category_id' , '=', 'categories.id')
        ->join('stores', 'categories.store_id', '=', 'stores.id')
       ->select('item_id','totalReceived','totalIssued','items.*', 'categories.*', 'stores.name as storeName',
           DB::Raw('totalReceived -totalIssued as Balance'))
           ->where('stores.name', $store)
           ->get();

        return $result;
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
