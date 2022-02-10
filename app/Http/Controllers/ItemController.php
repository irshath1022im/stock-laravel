<?php

namespace App\Http\Controllers;
use App\Item;
use App\Order;
use App\Receiving;
use App\IssuedItem;
use App\ItemQty;
use App\StoreRequestItem;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ItemController extends Controller
{



    public function index(Request $request)
    {

      
       return view('items.index');

    }

    public function show($id)
    {

        $query = Item::findOrFail($id);

        return view('items.show', ['item' => $query ]);


    }



    public function create()
    {
        return view('items.create');
    }


    


    public function issue(Request $request)
    {

      //  return 'hi';

        DB::beginTransaction();

        try {

            $deliveryItems = [
                'date' => '2020-11-25',
                'name' => 'delivery1',
            ];

            $result = DB::table('deliveries')->insertGetId($deliveryItems);
            dump($result);

            if ( $result) {

                //return $result;
                $issuedItems = [
                    ['delivery_id' => $result,'item_id' =>5,'qty'=>2],
                    // ['receiving_id' => $result,'item_id' =>2,'qty'=>2],
                ]
                ;
                $resultIssue= DB::table('issued_items')->insert($issuedItems);

                dump($issuedItems);
            }

            if ($issuedItems) {

               // return $resultOrder;

               $totalIssued= DB::table('issued_items')
                            ->select('*', DB::raw('sum(qty) as totalIssued'))
                            ->groupBy('item_id')
                            ->get();

               foreach($totalIssued as $issue){
                   DB::table('item_summaries')
                       ->updateOrInsert(
                           ['item_id'=>$issue->item_id],
                           ['totalIssued' => $issue->totalIssued]);
                         }

                $totalOrders= DB::table('orders')
                         ->select('*', DB::raw('sum(qty) as totalReceiving'))
                         ->groupBy('item_id')
                         ->get();

                         dump($totalOrders);

                foreach($totalOrders as $order){
                            DB::table('item_summaries')
                                   ->updateOrInsert(
                                       ['item_id' => $order->item_id],
                                       ['totalReceived' => $order->totalReceiving]);
                }

            }


            DB::commit();
            return redirect()->route('items')->with('success', 'data inserted successfully');



        } catch (\Exception $e) {

            dump( DB::rollback());
            // something went wrong
        }

    }

    public function updateIssued(Request $request, $table,$id)
    {
        //get the line id, then udpate the request
      //  dump($id);
        $requestingLineId= $id;
        // $dataForUpdates = ['delivery_id'=> 1,'item_id'=>2, 'qty'=>1];
        $dataForUpdates = ['qty'=>5];

            $result = DB::table('issued_items')
                        ->where('id', $requestingLineId)
                        ->update($dataForUpdates);

                  //  dump($result);

            if ($result) {

                    // return $resultOrder;

                    $totalIssued= DB::table('issued_items')
                                 ->select('*', DB::raw('sum(qty) as totalIssued'))
                                 ->groupBy('item_id')
                                 ->get();

                    foreach($totalIssued as $issue){
                        DB::table('items')
                            ->where('id', $issue->item_id)
                            ->update(['total_issued' => $issue->totalIssued]);
                    }

                 }

                 return redirect()->route('items')->with('success', 'data updated successfully');



    }



}
