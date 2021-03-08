<?php

namespace App\Http\Controllers;

use App\ItemSummary;
use App\Store;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemReportController extends Controller
{
    public function item($store)
    {

        if ( $store === 'uniform') {

            $result = Store::with(['category' => function($query){
                return $query->with(['item' => function($query){
                   return $query->with(['itemSummary' => function($query){
                       return $query->select('*',  DB::Raw('totalReceived -totalIssued as Balance'));
                   }])->get();
                }])
                       ->get();
               }])
                       ->where('name', $store)
                       ->get();

            // return $result[0]->category[0]->item[0]->itemSummary;

            return view('reports.uniforms', ['items' => $result]);

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
