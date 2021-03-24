<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index()
    {

        $result = Store::get();
        //return $result;

        return view('adminReports', ['stores'=>$result]);
    }
}
