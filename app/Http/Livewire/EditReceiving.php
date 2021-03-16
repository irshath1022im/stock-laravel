<?php

namespace App\Http\Livewire;

use App\Item;
use App\Order;
use App\Receiving;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class EditReceiving extends Component
{
    public $receivingId;
    public $receiving ;
    public $items = [];
    public $newOrders = [];
    public $item_id;
    public $qty;
    public $editProperties = [];
    public $updateBtnStatus=false;
    public $lineId;

    protected $rules = [
        'item_id' => 'required|not_in:0',
        'qty' => 'required|gt:0'
    ];

    protected $messages = [
        'item_id.required' => 'Please choose the Items',
    ];

    protected $validationAttributes = [
        'item_id' => 'item_id'
    ];

    public function mount ($receivingId)
    {

        $this->receivingId = $receivingId;
        $result = Receiving::with(['orders' => function($query){
            return $query->with('item')
                    ->get();
                    }])

        ->where('id', $receivingId)
        ->get();

        $this->items = Item::get();

        $this->receiving = $result[0];


    }

    public function addOrder(Request $request)
    {

        $this->validate();
        // array_push($this->newOrders, ['name' => 10]);

        Order::create([
                'item_id' => $this->item_id,
                'qty' => $this->qty,
                'receiving_id' => $this->receivingId
        ]);
            session()->flash('created', 'Item has been added');
        return redirect()->route('receiving.edit',['receiving'=> $this->receivingId]);

    }

    public function removeReceivingItem($lineId)
    {
        //get the line id
        Order::destroy($lineId);
        session()->flash('deleted', 'Item has been deleted');
        return redirect()->route('receiving.edit',['receiving'=> $this->receivingId]);
    }

    public function updateOrderItem($item_id, $qty, $id)
    {
        $updatedData = ['item_id' => $item_id, 'qty'=> $qty ];
        $this->qty = $qty;
        $this->item_id = $item_id;
        $this->updateBtnStatus = true;
        $this->lineId = $id;

    }

    public function updateItem()
    {
        $this->validate();

        $updatedData = ['item_id' => $this->item_id, 'qty'=> $this->qty ];

       Order::where('id', $this->lineId)->update($updatedData);
        session()->flash('updated', 'Item has been updated');
        return redirect()->route('receiving.edit', ['receiving' => $this->receivingId]);
    }

    public function changeBtnStatus()
    {
        $this->updateBtnStatus = false;

    }



    public function render()
    {
        return view('livewire.edit-receiving')->extends('layouts.adminLayout');
    }


}
