<?php

namespace App\Http\Controllers;
use App\Order;
use App\Store;
use App\Category;
use App\StoreRequestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Store::get();
        //return $result;

        return view('stores', ['stores'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('components.forms.addStoreForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //1. validate
        // by default, the Request method has validate properties

       $validatedData = $request->validate([
            'name' => 'required'
        ]);

        // dump( $validatedData);

        //2. insert into db
        // dump($request));
        $insertedData = Store::create($validatedData);

        return redirect('admin/adminStore')->with('message', 'Store Has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return 'from show';
        $result = Store::destroy($id);
    //    dd($result);
        return redirect('admin/adminStore')->with('message','Store Has been Deleted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $query = Store::findOrFail($id);
        return view('components.forms.addStoreForm', ['store'=>$query]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $result = Store::where('id', $id)
                        ->update(['name' => $request->name]);
        return redirect('admin/adminStore')->with('message', 'Store Has been updated!!!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return 'from destroy';
    }

    public function storeSummary($store_type)
    {

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


        // return $newCollection->where('store_name', '=', $store_type);
      return view('store', ['result'=>$newCollection ->where('store_name', '=', $store_type)]);
    }

    public function getStoreSummary($store)
    {

        $result = $this->getStoreSummaryData($store);

       // return $result;
        //dump($result);

        // return response()->json($result, 200);
        return view('store', ['data' => $result]);

    }

    public function getStoreSummaryData($store)
    {

        $result = Store::with(['category' => function($query){
            return $query->with(['item' => function($query){
               return $query;
                }
            ])
            ->get();
        }])
                   ->where('name', $store)
                   ->get();

                   return $result;

    }


    public function getStoreSummaryReport($store)
    {
        $result = $this->getStoreSummaryData($store);

        return $result;
        if ( $store === 'uniform') {


            return view('reports.uniforms', ['items' => $result]);
                // $pdf = PDF::loadView('reports.uniforms', compact('result'))->setPaper('a4', 'portrait');
                // return $pdf->stream('reports.uniforms.pdf');
        }else {


            return view('reports.promotions', ['items' => $result]);

            // $pdf = PDF::loadView('reports.promotions', compact('result'))->setPaper('a4', 'portrait');
            // return $pdf->stream('reports.promotions.pdf');
        }

    }


}
