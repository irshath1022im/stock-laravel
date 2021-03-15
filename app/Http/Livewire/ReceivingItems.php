<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReceivingItems extends Component
{
    
    public $receivingItems = 4;

    protected $listeners = [
        'clickedGetReceivingItems'
    ];

    public function clickedGetReceivingItems ()
    {
        // $this->getReceivingItems = Order::findOrFail($receivingId);
        $this->receivingItems = 'test';
    }

    
    public function render()
    {
        return view('livewire.receiving-items');
    }
}
