<?php

namespace App\Http\Livewire\Admin\Items;

use App\ItemQty;
use Livewire\Component;

class ItemBySize extends Component
{

    public $itemId;

    protected $listeners = ['getItemQtyBySize' => 'getItemQtyBySize'];

    public function getItemQtyBySize($id)
    {
        $this->itemId = $id;
    }

    public function render()
    {
        $result = ItemQty::where('item_id', $this->itemId)->get();
        return view('livewire.admin.items.item-by-size', ['items' => $result]);
    }
}
