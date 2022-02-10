<?php

namespace App\Http\Livewire\Items;

use App\ItemQty;
use Livewire\Component;
use Livewire\WithPagination;

class ItemTransections extends Component
{

    // public $loading = true;
    public $item_id;
    public $size_id ;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['sendSizeId' => 'receivedSizeId'];


    
    public function receivedSizeId($itemId, $sizeId)
    {
        $this->reset();
        $this->item_id = $itemId;
        $this->size_id = $sizeId;
        // $this->loading = false;
    
    }

    // public function updatedsize_id()
    // {
    //     $this->loading = false;
    // }

    // public function mount($item_id)
    // {
        
    //     if($item_id) {
    //         $this->item_id = $item_id;
    //         
    //     }
    // }


    public function render()
    {

        $query = ItemQty::with('transection') ->where('item_id', $this->item_id)
                            ->where('size_id', $this->size_id)
                            ->paginate(5);
        return view('livewire.items.item-transections', ['logs' => $query]);
    }
}
