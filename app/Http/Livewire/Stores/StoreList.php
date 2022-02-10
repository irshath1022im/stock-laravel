<?php

namespace App\Http\Livewire\Stores;

use App\Store;
use Livewire\Component;

class StoreList extends Component
{

    public $selectecdStore;

    // public function clearFilter()
    // {
    //     $this->selectedCategory = null;
    // }

    public function render()
    {

        $stores = Store::get();
        return view('livewire.stores.store-list', ['stores' => $stores]);
    }
}
