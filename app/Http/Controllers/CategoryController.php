<?php

namespace App\Http\Controllers;

use App\Store;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $result = Category::with(['store'])
        //                 ->get();

        // return response()->json($result, 200);
        // return view('adminCategory',['categories'=>$result]);
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $stores = $this->getStores();
        // return view('components.forms.categoryForm', ['stores' => $stores]);

        // return view()
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
            'category' => 'required',
            'store_id' => 'not_in:0'
        ]);

        // dump($validatedData);
        $query = Category::create($validatedData);

        return redirect('admin/category')->with('message','Category has been Added...');
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
        $deleteQuery = Category::destroy($id);
        return redirect()->route('category.index')->with('message', 'Category has been deleted...');
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
        // return 'from edit';
        $stores = $this->getStores();
        $category = Category::findOrFail($id);
        return view('components.forms.categoryForm', ['stores' => $stores,'category'=> $category]);
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

        // dump($request->file('category_logo'));

        if($request->hasfile('category_logo')){
            $file = $request->file('category_logo');

            //store the file in storage and get the path

           $path = Storage::disk('public')->putFileAs('categoryCoverPhotos', $file, $request->category . '.' . $file->guessExtension());

        } else {
            $path = null;
        }

        $validatedData = $request->validate([
            'category' => 'required',
            'store_id' => 'not_in:0',
        ]);

        $updatedCategory = [
            'category' => $request->category,
            'store_id' => $request->store_id,
            'coverPicture' => $path
        ];
        
        $updateQuery = Category::where('id', $id)
                        ->update($updatedCategory);
        // return 'from update';

        return redirect()->route('category.index')->with('message', 'Category has been updated...');
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
        return 'from destory';
    }

    public function category($category)
    {

            $result = Category::where('category', $category)
                    ->with(['item'=>function($query){
                        return $query->with(['itemSummary' => function($query){
                            return $query->select('*',DB::Raw('totalReceived - totalIssued as Balance'));
                    }])->get();
            }])

                        ->get();




            // return $result;

       // $issuedDetails = IssuedItem::get();

     // return $issuedDetails;
      return view('category', ['category'=>$result]);
    }


    // function (Request $request, $category) {

    //     // $result = App\Category::where('category', $category)->with([
    //     //             'item'=>function($query){
    //     //                 return $query->select('*', DB::raw('initialQty+total_received-total_issued as remaining'))
    //     //                 ->with(['issued_item' => function($query){
    //     //                   return  $query->with('staff')->orderByDesc('issued_date')->get();
    //     //                 }, 'order'])->get();
    //     //         }])

    //     //                     ->get();

    //         //    $result = Category::with(['itemIssued' => function($query){
    //         //        return $query->with('staff')->get();
    //         //    }])->where('category', $category)->get();

    //             // if ( isset ($request->staff_name)) {


    //             //         $result = DB::table('issued_items')
    //             //         ->join('items', 'issued_items.item_id', '=', 'items.id')
    //             //         ->join('staff', 'issued_items.staff_id', '=', 'staff.id')
    //             //         ->join('categories', 'items.category_id', '=', 'categories.id')
    //             //         ->select('issued_items.*','staff.staff_name', 'items.*', 'categories.*')
    //             //         ->where('categories.category', $category)
    //             //         ->where('staff.staff_name', $request->staff_name)
    //             //         ->where('issued_items.issued_date', '=', "2020-11-21")
    //             //         ->orderBy('issued_items.id', 'desc')
    //             //         ->paginate(10);

    //             //     return  $result->appends($request->except('page'));

    //             // } else {

    //             //     $result = DB::table('issued_items')
    //             //     ->join('items', 'issued_items.item_id', '=', 'items.id')
    //             //     ->join('staff', 'issued_items.staff_id', '=', 'staff.id')
    //             //     ->join('categories', 'items.category_id', '=', 'categories.id')
    //             //     ->select('issued_items.*','staff.staff_name', 'items.*', 'categories.*')
    //             //     ->where('categories.category', $category)
    //             //     ->orderBy('issued_items.id', 'desc')
    //             //     ->paginate(10);

    //             // return response()->json($result, 200);
    //             // }



    //            // dump($request);

    //             // $query->when($request->staff_name === true, function($query){

    //             //   //  dump(request);
    //             // });

    //             // $query->when(isset($request->issued_date), function($query){
    //             //     return $query->where('issued_items.issued_date', '>', $request->issued_date);
    //             // });

    //             // $result = $query





    //     $result = DB::table('items')
    //                     ->join('categories', 'items.category_id', '=', 'categories.id')
    //                     ->select('items.*', 'categories.*')
    //                     ->where('categories.category', $category)
    //                     ->get();

    //     //   dump($result);
    //         return $result;

    //        // $issuedDetails = IssuedItem::get();
    //             // dump($request);
    //      // return $issuedDetails;

    //     //    return view('category', ['category'=>$result]);
    //         }

    public function getStores()
    {
        $query = Store::get();
        return $query;
    }
}
