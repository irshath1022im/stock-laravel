<?php

namespace App\Http\Controllers;


use PDF;
use App\StoreRequest;
use Illuminate\Http\Request;

class StoreRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = StoreRequest::with(['staff','requested_items' => function($query){
            return $query->with('item')->get();
        }
        ])

                ->select('id', 'requesting_date', 'staff_id', 'status')
                ->orderByDesc('id')
                ->paginate(4);
                // dump($result);
                // return $result;

    //   return response()->json($result);;
        return view('adminStoreRequest', ['storeRequests' => $result ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('components.storeRequest.storeRequestFormControll');
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
        $result = StoreRequest::findOrFail($id);
        return view('components.storeRequest.showStoreRequest', ['receivingId' => $id]);
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
        $result = StoreRequest::findOrFail($id);

        return view('components.storeRequest.storeRequestFormControll',['storeRequestId' =>$id ]);
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
    }

    public function storeRequest($id)
    {
        $result = StoreRequest::with(['staff', 'requested_items' => function($query){
            return $query->with('item')->get();
        }])
                ->select('id', 'requesting_date', 'staff_id', 'status', 'remark')
                ->where('id', $id)
                ->get();


                // dump($result);

    //   return response($result);
      return view('reports.storeRequest', ['data' => $result]);
    // return view('reports.storeRequest2', ['data' => $result]);


    //    $pdf = PDF::loadView('reports.storeRequest', compact('data'))->setPaper('a4', 'portrait');
    //     return $pdf->download('reports.storeRequest.pdf');
    //    return $pdf->stream('reports.storeRequest.pdf');
    }
}
