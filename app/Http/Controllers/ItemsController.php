<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItem;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Item::paginate(10);
        // return response()->json($result, 200);
        return view('adminItems', ['items' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::get();
        return view('components.forms.createItemForm', ['categories'=> $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        //
        // dump($request->all());
        $validatedData = $request->validated();
        $result = Item::create($validatedData);

        return redirect()->route('items.index')->with('message', 'New Items Has been Added');
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
        // $result = Item::findOrFail($id);

        // return response()->json($result, 200);
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
        $category = Category::get();
        $result = Item::findOrFail($id);
        return view('components.forms.createItemForm', ['item'=> $result,'categories'=> $category]);
        // return 'from edit' .$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreItem $request, $id)
    {
        //
    $validatedData = $request->validated();
    $result = Item::where('id', $id)->update($validatedData);

    return redirect()->route('items.index')->with('updated', ' Item #-'.$id.' Has been Updated...');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // return 'from destroy';
        $result = Item::where('id', $id)->delete();

        return redirect()->route('items.index')->with('deleted', 'Items Has been Deleted');

    }
}
