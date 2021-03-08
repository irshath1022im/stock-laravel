<?php

namespace App\Http\Controllers;

use App\StoreRequestItems;
use Illuminate\Http\Request;

class StoreRequestItemsController extends Controller
{
    //
    public function delteStoreRequestItem($id)
    {
       $result = StoreRequestItems::findOrFail($id)->delete();

       return $result;
    }
}
