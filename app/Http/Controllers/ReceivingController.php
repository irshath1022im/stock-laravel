<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Receiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreReceiving;
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
            ->paginate(10)
            ;

            // return response()->json($result, 200);
            return view('adminReceiving', ['receivings'=> $result]);
    }

    public function create()
    {
        
        // return view('components.forms.createReceivingForm');
        return view ('receivings.create');
    }

    public function show($id)
    {
        $result = Receiving::with(['orders' => function($query){
            return $query->with('item')
                    ->get();
        }])

        ->where('id', $id)
        ->get()
        ;

        // return response()->json($result, 200);
        return view('receiving', ['receiving' => $result]);
    }

    public function edit($id)
    {

        // $result = Receiving::findOrFail($id);

        // $result = Receiving::with(['orders' => function($query){
        //     return $query->with('item')
        //             ->get();
        //             }])

        // ->where('id', $id)
        // ->get();

        // return response($result);
        // return view('components.forms.createReceivingForm',  ['receiving' => $result[0]]);
        return view('components.receiving.editReceiving', ['receivingId' => $id]);


    }

    public function destroy($id)
    {
        $receiving = Receiving::findOrFail($id)->delete();
        $orders = Order::where('receiving_id', $id)->delete();

        return redirect()->route('receiving.index')->with('deleted', 'Deleted');
    }


    public function store(StoreReceiving $request)
    {
        $validatedData = $request->validated();
        $result = Receiving::create($validatedData);

        return redirect()->route('receiving.edit',['receiving'=>$result->id])->with('stored', 'New Receiving Addedd...');
    }



    public function update(StoreReceiving $request, $id)
    {

        $validatedData = $request->validated();
        $result = Receiving::where('id', $id)->update($validatedData);

        // return redirect()->route('receiving.index')->with('updated', 'Receiving Updated...');
        return redirect()->route('receiving.edit', ['receiving' => $id])->with('updated', 'Receiving Updated...');

        //get the id of request
        //check the receiving is there or no

    }



}
