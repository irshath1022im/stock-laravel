<?php

namespace App\Http\Controllers;

use App\StoreRequest;
use App\StoreRequestItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreRequestController extends Controller
{
    // get all the request with items

    public function updateSummary()
    {
        $totalIssued= DB::table('store_request_items')
        ->select('*', DB::raw('sum(qty) as totalIssued'))
        ->groupBy('item_id')
        ->get();

            foreach($totalIssued as $issue){
            DB::table('item_summaries')
                ->updateOrInsert(
                    ['item_id'=>$issue->item_id],
                    ['totalIssued' => $issue->totalIssued]);
                    }
    }

    public function index()
    {
        $result = StoreRequest::with(['staff','requested_items' => function($query){
            return $query->with('item')->get();
        }
        ])

                ->select('id', 'requesting_date', 'staff_id', 'status')
                ->orderByDesc('id')
                ->paginate(4);
                // dump($result);
                // return $result;

      return response()->json($result);;
    }



    public function store(Request $request)
    {

        $rules = [
                'requesting_date' => 'required|date_format:Y-m-d',
                'staff_id' => 'required|integer',
                'orders' => 'required|array',
                'status' => 'required',
                'orders.*.item_id' => 'required',
                'orders.*.qty' => 'required',
            ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

            $validated_order_details = [
                'requesting_date' => $request->requesting_date,
                'staff_id' => $request->staff_id,
                'status' =>  $request->status
                ];

            $query = StoreRequest::insertGetId($validated_order_details);

        if( $query) {

            $insertedId = $query;
             $itemsInArray = [];

                     // $queryOrders = StoreRequest::insertGetId($validator->validated());
            foreach ($request->orders as $key => $value) {
                // dump($insertedId);
                // dump($value);

                $items = [
                    'store_request_id' => $insertedId,
                    'item_id' => $value['item_id'],
                    'qty' =>$value['qty'],
                ];

                array_push($itemsInArray, $items);
                // dump($itemsInArray[$key]);
                $query = StoreRequestItems::create($itemsInArray[$key]);
                // dump($query->id);
                // return $query;

            }

            $this->updateSummary();

             return response()->json('inserted', 200);

            // $query = StoreRequestItems::insert($items);
            // return $query;
            // $requestedId = $query;
            // $itemsInArray = $request->orders;

            // return response()->json($itemsInArray, 200);

                // $items = [
                //     'store_request_id' => $query,
                //     'item_id' => $request->orders[0]['item_id'],
                //     'qty' =>5, 'created_at' => date('Y-m-d H:i:s'),
                //     'updated_at' => date('Y-m-d H:i:s')
                // ];
            // //         ['store_request_id' => $query,'item_id' => 3, 'qty' =>3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
            // //     ];


            // return response()->json($query, 200);
        }

    }

    public function storeRequest($id)
    {
        $result = StoreRequest::with(['staff', 'requested_items' => function($query){
            return $query->with('item')->get();
        }])
                ->select('id', 'requesting_date', 'staff_id', 'status')
                ->where('id', $id)
                ->get();


                // dump($result);

    //   return response($result);
      return view('storeRequest', ['data' => $result]);
    }

    public function updateRequest(Request $request, $id)
    {

        $result = StoreRequest::find($id);

        if( !empty($result)){

            $result->requesting_date = $request->requesting_date;
            $result->staff_id = $request->staff_id;
            $result->status = $request->status;

            $result->save();

            // dump($result->id);

            $store_request_id = $result->id;

            $itemsInArray = [];

                foreach ($request->orders as $key => $value) {
                    // dump($insertedId);

                    //    dump($value['id']);

                    $items = [
                        'store_request_id' => $store_request_id,
                        'item_id' => $value['item_id'],
                        'qty' =>$value['qty'],
                    ];

                    dump(isset($value['id']));

                        if ( !isset($value['id'])) {

                            $query = DB::table('store_request_items')
                            ->insert(
                                [
                                    'store_request_id' => $store_request_id,
                                    'item_id' => $value['item_id'],
                                    'qty' => $value['qty']]
                            );

                        } else {

                            $query = DB::table('store_request_items')
                            ->updateOrInsert(
                                ['id' => $value['id']],
                                ['store_request_id' => $store_request_id, 'item_id' => $value['item_id'],'qty' => $value['qty']]
                            );
                        }

                    //    array_push($itemsInArray, $items);
                    //    dump($itemsInArray[$key]);


                    // $query = StoreRequestItems::where('id', $value['id'])
                    //                 ->update($items);

                    // $query = DB::table('store_request_items')
                    //             ->updateOrInsert(
                    //             ['id'=> 1], //matching creteria
                    //               // update the data or insert
                    // );

                        // dump($value['id']);
                        // $query = StoreRequestItems::findOrFail($value['id']);


                        // dump($query);

                    // $query = StoreRequestItems::insert($items);

                    //  return($query);

                    //    $itemQuery = StoreRequestItems::where('store_request_id', $store_request_id)->delete();

                    //remove the items related with store_request

                    //    $getItem = StoreRequestItems::where('store_request_id', $store_request_id)->get();

                    }

                    $this->updateSummary();

         return response()->json('success');


        }else {
            return 'notfound';
        }




    }

    public function storeDelete($id)
    {
               $result = StoreRequest::where('id', $id)
                            ->delete();


                $store_request_result = 'No Transection';
                $resultItems = 'No Transection';

                    if($result) {

                        $store_request_result = 'Store Request is being removed...';



                        $items = StoreRequestItems::where('store_request_id', $id)
                                                ->delete();

                            if( $items) {
                                $resultItems = 'Store Request Items Removed';
                            }
                            else {
                                // $resultItems = 'Wrong in Request Items Table!!!';
                                $resultItems = $items;

                            }

                        $this->updateSummary();

                        return response()->json(['store_request' => $store_request_result, 'request_items' => $resultItems ],  200);

                    }
                    else {
                        $store_request_result = $result;
                        return response()->json(['store_request' => $store_request_result, 'request_items' => $resultItems ],  200);
                    }



    }


}
