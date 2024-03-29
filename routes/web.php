<?php

use App\Staff;
use App\Store;
use App\Delivery;
// use App\Http\Livewire\ItemsLivewire;
use App\IssuedItem;
use App\ItemSummary;

use App\Http\Livewire\Login;
use App\Http\Livewire\UserLivewire;
use App\Http\Livewire\ItemsLivewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreRequest;
use App\Http\Livewire\HomePageLivewire;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReceivingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ItemReportController;
use App\Http\Controllers\PromotionalItems;
use App\Http\Controllers\StoreRequestController;
use App\Http\Controllers\ReceivingItemsController;
use App\Http\Livewire\Admin\Items\ItemIndex;
use App\Item;
use App\ItemQty;

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



// Route::get('/', [StoreController::class,'index']);


Route::get('/', HomePageLivewire::class)->name('homePage2');


Route::get('/admin/adminStore', function () {
    $stores = Store::get();
    // dump($stores);
    return view('adminStore', ['stores' => $stores]);
})->name('adminStore')->middleware('auth');

Route::resource('items', ItemController::class);


Route::resource('/admin/category', CategoryController::class)->middleware('auth');
Route::resource('category', CategoryController::class);
// Route::resource('/admin/items', ItemsController::class)->middleware('auth');
Route::get('/admin/items', ItemIndex::class)->name('items');
Route::resource('/admin/receiving', ReceivingController::class)->middleware('auth');
Route::resource('/admin/receivingItems', ReceivingItemsController::class)->middleware('auth');
Route::resource('/admin/storeRequest', StoreRequestController::class)->middleware('auth');
Route::get('/admin/user', UserLivewire::class)->name('adminUser')->middleware('auth');
Route::get('/admin/reports', [ReportController::class, 'index'])->name('adminReports');

Route::resource('/store', StoreController::class);


Route::get('/reports/{store}', [ItemReportController::class,'item'])->name('storeReport');
Route::get('/store/storeSummary/{store_type}', [StoreController::class,'storeSummary'])->name('storeSummary');
Route::get('/storeRequest/{storeRequestId}' , [StoreRequestController::class, 'storeRequest'])->name('storeRequestPrint');

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::resource('/promotional-items', PromotionalItems::class);


// Route::get('/items2', [ItemController::class, 'index'])->name('items2');
// Route::get('/items', ItemsLivewire::class)->name('items');
// Route::get('/report/items', [ItemReportController::class,'item'] );

// Route::get('/report/items/pdf', 'ItemReportController@getPdfItem')->name('itemsPdf');





// Route::get('/admin/adminItems', function () {
//     return view('adminItems');
// })->name('adminItems');

// Route::get('/items/delivery', 'ItemController@store');
// Route::get('/items/issue', 'ItemController@issue');
// Route::get('/items/update/{delivery}/{lineId}', 'ItemController@updateIssued');


// Route::get('/category/{category}', 'CategoryController@category')->name('category');

// Route::get('items/transections/{name}', function ($id) {

//     $result = IssuedItem::with('staff')->get();

//     return $result;

// });

// Route::get('products', function () {
//     return view('products');
// });


// Route::get('/test/items', function(){
    
//     return Store::with(['categoryItems' => function($query) {
//         return $query->take(2)->get();
//     }])->where('id',1)->get();
// });



Route::get('test/items/{id}/itemsQtyBySize', function($id){

    // return ItemQty::with('item')->where('item_id', $id)
    //                     ->selectRaw('sum(qty) as total')
    //                     ->groupBy('size_id')

    //                     ->get();
    
    return Item::with(['itemQty' => function($query){
        return $query->selectRaw('sum(qty) as total')
                    ->groupBy('size_id', 'item_id')
                    ;
    }])->findOrFail($id);
});