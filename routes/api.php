<?php

use App\Item;
use App\Order;
use App\Staff;
use App\Store;
use App\Category;
use App\Delivery;
use App\Receiving;
use App\IssuedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/stores/{store}', 'StoreController@getStoreSummary');

Route::get('/v1/{category}', function ($category) {

        $result = Category::with(['item' => function($query){
                return $query->with(['issued_item' => function($query){
                            return $query->select('*',DB::raw('SUM(qty) as total'))
                            ->groupBy('item_id');
                           }]);
                        }])
                        ->where('category', $category)
                        ->get();

        return response()->json($result[0], 200);

});

Route::get('/v1/category/{category}', 'CategoryController@category');

Route::get('/v1/category/{itemCategory}/{transectionType}', function(Request $request, $itemCategory, $transectionType){


    $query = Category::where('category', $itemCategory)->get();
    $categoryId = $query[0]->id;


            if ( $transectionType === 'receiving')
            {
                //get the categoryId looking for

               // dump($categoryId);

                    $roleReceiving_date = $request->date;



                    // $result = DB::table('orders')
                    //                 ->join('items', 'items.id', '=', 'orders.item_id')
                    //                 ->join('receivings', 'receivings.id', '=', 'orders.receiving_id')
                    //                 ->join('categories', 'categories.id', '=', 'items.category_id')
                    //                 ->select('orders.id','receivings.receiving_date','receivings.supplier_name','items.name', 'categories.category', 'orders.qty')
                    //                 ->where('categories.id', $categoryId)
                    //                 ->orderByDesc('orders.id')
                    //                 ->get();

                    $result = DB::table('orders')
                                ->join('items', 'orders.item_id', '=', 'items.id')
                                ->join('categories', 'categories.id', '=', 'items.category_id')
                                ->join('receivings', 'receivings.id', '=', 'orders.receiving_id')
                                ->select('orders.id', 'receivings.receiving_date','receivings.supplier_name','orders.qty','items.name','categories.category')
                                ->where('categories.id', $categoryId)
                                ->orderByDesc('orders.id')
                                ->paginate(10);

            // dump($result);

                    // $itemsBelongsCategory = Item::where('category_id', get();

                // $result = Category::where('category', $itemCategory)
                //                 ->get();

                return response($result);

            } else if($transectionType === 'issued') {

               // dump($categoryId);
                $roleStaffname = $request->staff_name;
                $issuedDate = $request->issued_date;
                //dump($roleStaffname);
                //dump($categoryId);

                    // $result = DB::table('issued_items')
                    //         ->join('items', 'issued_items.item_id', '=', 'items.id')
                    //         ->join('categories', 'items.category_id', '=', 'categories.id')
                    //         ->select('issued_items.id', 'issued_items.issued_date', 'issued_items.item_id', 'items.name','categories.category')
                    //         ->where('categories.id', $categoryId)
                    //         ->paginate(10);

                $result = DB::table('issued_items')
                        ->join('items', 'issued_items.item_id', '=', 'items.id')
                        ->join('staff', 'issued_items.staff_id', '=', 'staff.id')
                        ->join('categories', 'items.category_id', '=', 'categories.id')
                        ->select('issued_items.id','issued_items.issued_date', 'issued_items.qty','staff.staff_name', 'items.name', 'categories.category')
                        ->where('categories.id', $categoryId)
                        ->orderBy('issued_items.id', 'desc')
                        ->when($roleStaffname, function($query, $roleStaffname){
                                return $query->where('staff.staff_name', $roleStaffname);
                                })
                        ->when($issuedDate, function($query, $issuedDate){
                                return $query->where('issued_items.issued_date', '>', $issuedDate);
                                  })
                        ->paginate(10);

                   // dump(response($result));
                   return $result;
            }
});

Route::post('/v1/addIssue', 'ItemController@issue');


Route::get('/v1/items/issue', 'ItemController@issue');


Route::get('/v1/items/summary', 'ItemSummaryController@getSummary');


// Route::get('/v1/items/summary/{item_id}', 'ItemSummaryController@getSummary');

// Route::get('/v1/admin/items', function () {
//     $result = Item::select('id', 'name')->get();
//      return response()->json($result);
// });


Route::get('v1/admin/staff', function(){
    $result = Staff::select('id', 'staff_name')->get();
   return response()->json($result);
});

Route::get('/v1/admin/storeRequests', 'StoreRequestController@index');
Route::post('/v1/admin/storeRequests/store', 'StoreRequestController@store');
Route::post('/v1/admin/storeRequest/{id}', 'StoreRequestController@storeDelete');
Route::post('/v1/admin/storeRequest/update/{request_id}', 'StoreRequestController@updateRequest');
Route::post('/v1/admin/storeRequestItems/delete/{id}', 'StoreRequestItemsController@delteStoreRequestItem');


Route::get('/v1/admin/receivings', 'ReceivingController@index');
Route::get('/v1/admin/receivings/{id}', 'ReceivingController@show');
Route::post('/v1/admin/receivings/new', 'ReceivingController@store');
Route::post('/v1/admin/receiving/{id}', 'ReceivingController@deleteReceiving');
Route::post('/v1/admin/receiving/orders/remove/{order_id}', 'ReceivingController@deleteOrder');
Route::post('/v1/admin/receiving/update/{receiving_id}', 'ReceivingController@update' );


Route::get('/v1/admin/receiving/receivingItems', 'ReceivingItemsController@index');
Route::get('/v1/admin/receiving/receivingItems/{id}', 'ReceivingItemsController@show');
Route::post('/v1/admin/receiving/receivingItems/new', 'ReceivingItemsController@store');
Route::put('/v1/admin/receiving/receivingItems/{id}', 'ReceivingItemsController@update');
Route::delete('/v1/admin/receiving/receivingItems/{id}', 'ReceivingItemsController@destroy');

Route::resource('/v1/admin/items', 'ItemsController');

Route::get('/v1/admin/category', 'CategoryController@index');

// Route::post('/v1/items/delivery', 'ReceivingController@store');
