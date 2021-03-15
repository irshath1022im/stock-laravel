<?php

use App\Staff;
use App\Store;
use App\Delivery;
// use App\Http\Livewire\ItemsLivewire;
use App\IssuedItem;
use App\ItemSummary;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/{any?}/{second?}', function () {
//     return view('welcome');
// });

Route::get('/', 'StoreController@index');


Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/admin/adminStore', function () {
    $stores = Store::get();
    // dump($stores);
    return view('adminStore', ['stores' => $stores]);
})->name('adminStore');

Route::resource('/store', 'StoreController');

Route::resource('/admin/category', 'CategoryController');

Route::resource('/admin/items', 'ItemsController');

Route::resource('/admin/receiving', 'ReceivingController');
Route::resource('/admin/receivingItems', 'ReceivingItemsController');

Route::get('/admin/adminItems', function () {
    return view('adminItems');
})->name('adminItems');



// Route::get('/report/items', 'ItemReportController@item' );

// Route::get('/report/items/pdf', 'ItemReportController@getPdfItem')->name('itemsPdf');

// Route::get('/reports/{store}', 'ItemReportController@item')->name('storeReport');

// Route::get('/storeRequest/{storeRequestId}' , 'StoreRequestController@storeRequest');

Route::get('/store/storeSummary/{store_type}', 'StoreController@getStoreSummary')->name('storeSummary');






Route::get('/items', 'ItemController@index')->name('items');

// Route::get('/items/delivery', 'ItemController@store');
// Route::get('/items/issue', 'ItemController@issue');
// Route::get('/items/update/{delivery}/{lineId}', 'ItemController@updateIssued');


Route::get('/category/{category}', 'CategoryController@category')->name('category');

Route::get('items/transections/{name}', function ($id) {

    $result = IssuedItem::with('staff')->get();

    return $result;

});

Route::get('products', function () {
    return view('products');
});

// // Route::get('/items', ItemsLivewire::class);



