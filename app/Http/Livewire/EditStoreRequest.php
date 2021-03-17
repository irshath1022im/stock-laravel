<?php

namespace App\Http\Livewire;

use App\StoreRequest;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class EditStoreRequest extends Component
{

    public $storeRequestId;
    public $storeRequest;
    public $staffs = [];
    public $items = ['test'];
    public $qty;
    public $updateBtnStatus = false;
    public $requesting_date;
    public $staff_id;
    public $test;
    public $remark;
    public $status;

    protected $rules = [
        'requesting_date' => 'required',
        'staff_id' => 'required|not_in:0',
        'status'=>'required|not_in:0',
        'remark' => 'required'
    ];

    public function mount($storeRequestId)
    {
        $this->storeRequestId = $storeRequestId;

        $result = StoreRequest::with(['staff','requested_items' => function($query){
            return $query->with('item')->get();
                     }
                         ])

                ->where('id', $storeRequestId)
                ->get();

        $this->storeRequest = $result[0];
    }

    public function updateStoreRequest(Request $request)
    {

        $this->validate();

        $newRequest = [
            'requesting_date' => $this->requesting_date,
            'staff_id' => $this->staff_id,
            'remark' => $this->remark,
            'status' => $this->status
        ];

        $result = StoreRequest::create($newRequest);

        session()->flash('created', 'New Request is being addedd');
        redirect()->route('storeRequest.show',['storeRequest' => $result->id]);

    }

    public function render()
    {
        return view('livewire.edit-store-request');
    }
}
