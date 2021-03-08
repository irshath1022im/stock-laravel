<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Receiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReceivingController extends Controller
{
    public function index()
    {
            $result = Receiving::with(['orders' => function($query){
                return $query->with('item')
                        ->get();
            }])
            ->orderBy('id', 'Desc' )
            ->get()
            ->take(5)
            ;

            return response()->json($result, 200);
    }

    public function show($id)
    {
        $result = Receiving::with(['orders' => function($query){
            return $query->with('item')
                    ->orderBy('id', 'Desc' )
                    ->get();
        }])

        ->where('id', $id)
        ->get()
        ->take(5)
        ;

        return response()->json($result, 200);
    }

    public function deleteReceiving($id) {

        //make sure there is receving for the id

        $message = '';
        $receiving = Receiving::findOrFail($id)->delete();
        $orders = Order::where('receiving_id', $id)->delete();

        if($receiving && $orders) {
            return response()->json('deleted', 200);

        } else {
            return response()->json($receiving, 200);

        }


    }

    public function store(Request $request)
    {
            $rules = [
                'receiving_date' => 'required|date_format:Y-m-d',
                'supplier_name' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()) {
                return response()->json($validator->errors());
            } else {

                $receivingDetails = [
                    'receiving_date' => $request->receiving_date,
                    'supplier_name' => $request->supplier_name
                ];

            $result = DB::table('receivings')->insertGetId($receivingDetails);

             return response()->json($result, 200);

            }



        // // return 'fromstore';
        // DB::beginTransaction();


        // try {

        //     $rules = [
        //         'receiving_date' => 'required|date_format:Y-m-d',
        //         'supplier_name' => 'required',
        //         'orders' => 'required|array',
        //         'orders.*.item_id' => 'required',
        //         'orders.*.qty' => 'required',
        //     ];

        //     $validator = Validator::make($request->all(), $rules);

        //     if($validator->fails()) {
        //         return response()->json($validator->errors());
        //     }




        //     $result = DB::table('receivings')->insertGetId($receivingDetails);

        //     dump($result);



        //     if ($result) {

        //         $insertedReceivingId = $result;
        //         // return $result;

        //         foreach ($request->orders as $value) {

        //             // dump($value);
        //             // dump($insertedReceivingId);


        //             $resultOrder= DB::table('orders')->insert([
        //                 'receiving_id' => $insertedReceivingId,
        //                 'item_id' => $value['item_id'],
        //                 'qty' => $value['qty']
        //             ]);

        //             // dump($resultOrder);  // return true / false
        //         }

        //         // $resultOrder= DB::table('orders')->insert($request->orders);

        //         // dump($resultOrder); // return true / false


        //     }

        //     if ($resultOrder) {

        //     //    dump($resultOrder);

        //        $totalOrders= DB::table('orders')
        //                     ->select('*', DB::raw('sum(qty) as totalReceiving'))
        //                     ->groupBy('item_id')
        //                     ->get();

        //                     dump($totalOrders);

        //     foreach($totalOrders as $order){
        //      DB::table('item_summaries')
        //             ->updateOrInsert(
        //                 ['item_id' => $order->item_id],
        //                 ['totalReceived' => $order->totalReceiving]);
        //             }

        //     }


        //     DB::commit();

        //     // return redirect()->route('items')->with('success', 'data inserted successfully');


        // } catch (\Exception $e) {

        //     // dump( DB::rollback());
        //     // something went wrong
        // }


    }


    public function udpate(Request $request, $receiving_id)
    {
        //get the id of request
        //check the receiving is there or not

        $result = Receiving::findOrFail($receiving_id);

        return $result;

    }



}
