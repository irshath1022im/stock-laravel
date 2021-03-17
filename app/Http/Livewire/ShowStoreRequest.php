<?php

namespace App\Http\Livewire;

use App\StoreRequest;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class ShowStoreRequest extends Component
{
    public $requestId;
    public $storeRequest=[];

    public function mount(Request $request, $receivingId)
    {
        $this->requestId = $receivingId;

        $this->storeRequest = StoreRequest::with(['staff','requested_items' => function($query){
            return $query->with('item')->get();
                     }
                         ])

                ->select('id', 'requesting_date', 'staff_id', 'status')
                ->where('id', $receivingId)
                ->get();
    }



    public function render()
    {
        return view('livewire.show-store-request');
    }
}
