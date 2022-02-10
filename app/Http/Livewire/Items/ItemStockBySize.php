<?php

namespace App\Http\Livewire\Items;

use App\ItemQty;
use Livewire\Component;

class ItemStockBySize extends Component
{
    
    public $item_id;

    public function mount($item_id)
    {
        $this->item_id = $item_id;
    }

    public function render()
    {

        $query = ItemQty::where('item_id', $this->item_id)
        ->with('size')
        ->selectRaw('size_id, SUM(qty) as total')
        ->groupBy('size_id')
        ->get();

        return view('livewire.items.item-stock-by-size', ['itemQty' => $query]);
    }
}
