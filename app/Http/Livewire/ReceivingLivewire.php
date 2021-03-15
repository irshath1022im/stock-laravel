<?php

namespace App\Http\Livewire;

use App\Receiving;
use Livewire\Component;
use Livewire\WithPagination;

class ReceivingLivewire extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $orderItems;

    public function displayOrderItems()
    {
        $this->orderItems = ['test1'];
    }

    public function render()
    {

        $result = Receiving::paginate(10);

        // return response()->json($result, 200);
        return view('livewire.receiving-livewire', ['receivings' => $result]);
    }
}
