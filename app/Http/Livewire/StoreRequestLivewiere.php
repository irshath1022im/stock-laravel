<?php

namespace App\Http\Livewire;

use App\Item;
use App\Staff;
use App\StoreRequest;
use App\StoreRequestItem;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

class StoreRequestLivewiere extends Component
{

    public $requestId;
    public $staffs = [];
    public $items = [];
    public $item_id;
    public $qty;
    public $updateBtnStatus = false;
    public $requesting_date;
    public $staff_id;
    public $test;
    public $remark;
    public $status;
    public $storeRequestMode;
    public $storeRequest;


    protected $rules = [
        'requesting_date' => 'required',
        'staff_id' => 'required|not_in:0',
        'status'=>'required|not_in:0',
        'remark' => 'required'
    ];

    protected $listeners =['removeStoreRequestItem'];


    public function removeStoreRequestItem($lineId)
    {

        StoreRequestItem::destroy($lineId);

        session()->flash('deleted', 'Request Item has been deleted');


    }

    public function mount(Request $request,$storeRequestId)
    {

        $this->staffs = Staff::get();
        $this->items = Item::get();

            if(!$storeRequestId) {
                $this->storeRequestMode = 'NEW';
                $this->requestId = 'NEW';
            }else {
                $this->storeRequestMode = 'EDIT';
                $this->requestId = $storeRequestId;

                        $result = StoreRequest::with(['staff','requested_items' => function($query){
                            return $query->with('item')->get();
                                    }
                                        ])

                                ->where('id', $storeRequestId)
                                ->get();
                            $this->storeRequest = $result[0];
                            $this->requesting_date = $result[0]->requesting_date;
                            $this->remark = $result[0]->remark;
                            $this->staff_id = $result[0]->staff_id;
                            $this->status = $result[0]->status;

            }
    }

    public function addStoreRequest(Request $request)
    {

        $this->validate();

        $newRequest = [
            'requesting_date' => $this->requesting_date,
            'staff_id' => $this->staff_id,
            'remark' => $this->remark,
            'status' => $this->status
        ];

        if( $this->storeRequestMode === 'NEW') {

             $result = StoreRequest::create($newRequest);

            session()->flash('created', 'New Request is being addedd');
            redirect()->route('storeRequest.show',['storeRequest' => $result->id]);

        }else if($this->storeRequestMode === 'EDIT'){
            $result = StoreRequest::where('id', $this->requestId)->update($newRequest);

            session()->flash('updated', 'Request is being updated');
            redirect()->route('storeRequest.show',['storeRequest' => $this->requestId]);
        }



    }

    public function render()
    {
        return view('livewire.store-request-livewiere');
    }
}
