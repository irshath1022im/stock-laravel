<?php

namespace App\Http\Livewire\Receiving;

use App\ItemQty;
use App\ItemSize;
use App\TransectionType;
use Livewire\Component;

class NewReceiving extends Component
{

    public $selectedItemId;
    public $selectedDate;
    public $selectedTypeId;
    public $selectedSizeId;
    public $selectedQty;
    public $transectionType=[];
    public $itemSizes=[];

    protected $listeners = ['selectedItemId'] ;

    protected $rules=[
        'selectedDate' => 'required',
        'selectedItemId' => 'required',
        'selectedQty' => 'required',
        'selectedSizeId' => 'required',
        'selectedTypeId' => 'required'
    ];

    public function selectedItemId($itemId)
    {
        $this->selectedItemId = $itemId;
    }

    public function addToTransection()
    {
        $validated = $this->validate();

       ItemQty::create([
           'date' => $validated['selectedDate'],
           'item_id' => $validated['selectedItemId'],
           'qty' => $validated['selectedQty'],
           'size_id' => $validated['selectedSizeId'],
            'transection_id' => $validated['selectedTypeId']
       ]);

       session()->flash('success', 'New Transection has been added...!');

       $this->resetExcept(['transectionType','itemSizes']);
       $this->emit('resetSelectedItem');

    }

    public function mount()
    {
        $this->transectionType = TransectionType::get();
        $this->itemSizes = ItemSize::get();
    }


    public function render()
    {
        return view('livewire.receiving.new-receiving');
    }
}
