<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Http\Request;

class ReceivingItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('adminReceivingItems');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = Item::get();
        return view('components.forms.createReceivingItemsForm', ['items'=> $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dump($request->all());

        $validatedData = $request->validate([
            'receiving_id' => 'required',
            'item_id' => 'required | not_in:0',
            'qty' => 'required|not_in:0',
        ]);

        //validate the data
        // return $request;
        // $orderDetails=[
        //     'receiving_id' => $request->receiving_id,
        //     'item_id' => $request->item_id,
        //     'qty' => $request->qty
        // ];

        // $result = Order::create($orderDetails);

        // // return response()->json(['message' => 'success', 'insertedId' => $result->id]);
        //  return response()->json($result, 200);
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
        return 'from show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {

        $result = Order::findOrFail($id);
        $items = Item::get();
        return view('components.forms.createReceivingItemsForm', ['orderItem' => $result, 'items'=>$items]);
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

        // dump($request->all());
        $validatedData = $request->validate([
            'item_id' => 'required | not_in:0',
            'qty' => 'required|not_in:0',
        ]);

        $result = Order::where('id', $id)->update($validatedData);

         return redirect()->route('receiving.edit', ['receiving' => $request->receiving_id])->with('updated', 'Successfully Updateddd');

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
        //get the line id
        //remove from table

        // return $lineId;
        $message = '';
        $result = Order::findOrFail($id);

        if($result) {
           $removeItem = Order::where('id', $id)->delete();
           $message = 'Item Has been Removed ...';
        }
        return response()->json($message, 200);
    }
}
