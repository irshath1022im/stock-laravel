<?php

namespace App\Http\Livewire;

use App\Item;
use Livewire\Component;
use App\StoreRequestItem;
use Illuminate\Support\Facades\Request;

class StoreRequestItems extends Component
{

    public $storeRequestId;
    public $storeRequestItems = [];
    public $items=[];
    public $item_id;
    public $qty=0;
    public $remark;
    public $updateBtnStatus = false;

    protected $rules = [
        'item_id' => 'required|not_in:0',
        'qty' => 'required|gt:0',
        'remark' => 'required'
    ];

    protected $messages = [
        'item_id.required' => 'Please choose the Items',
    ];

    protected $validationAttributes = [
        'item_id' => 'item_id'
    ];

    public function addStoreRequest(Request $request)
    {

        $this->validate();
        // array_push($this->newOrders, ['name' => 10]);

        StoreRequestItem::create([
                'item_id' => $this->item_id,
                'qty' => $this->qty,
                'store_request_id' => $this->storeRequestId,
                'remark' => $this->remark
        ]);
            session()->flash('created', 'Item has been added');
        return redirect()->route('storeRequest.edit',['storeRequest'=> $this->storeRequestId]);

    }

    public function changeBtnStatus()
    {
        $this->updateBtnStatus = !$this->updateBtnStatus;
        $this->qty = 0;
        $this->item_id = 0;
    }


    public function mount($storeRequestId, $storeRequestItems) // this storeRequestId will receive from parent livewire component , store-request-livewire.blade.php
    {
        $this->items = Item::get();
        $this->storeRequestId = $storeRequestId;
        $this->storeRequestItems = $storeRequestItems;
    }


    public function render()
    {
        return view('livewire.store-request-items');
    }
}
