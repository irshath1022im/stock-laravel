<?php

namespace App\Http\Livewire\Items;

use App\Item;
use Livewire\Component;

class ItemSearchBar extends Component
{

    public $searchValue;
    public $selectedValue;
    public $searchResult=[];
    public $selectedItemId;

    protected $listeners = ['resetSelectedItem'];

    public function resetSelectedItem()
    {
        $this->searchValue = '';
    }


    public function updatedSearchValue()
    {
        if(empty($this->searchValue)){
            $this->searchResult = [];
            $this->emit('selectedItemId', '');
        }
            else{
                    $result =Item::
                    when($this->searchValue, function($query){
                        return $query->where('name', 'like', $this->searchValue.'%');
                    })
                    ->get()
                    ->take(4)
                    ;

                  $this->searchResult = $result;
                }
    }

    public function selectedValue($item)
    {
        $this->searchValue = $item['name'];
        $this->searchResult = [];

        $this->emit('selectedItemId', $item['id']);
    }

    public function render()
    {
        // $result = Item::
        //             when($this->searchValue, function($query){
        //                 return $query->where('name', 'like', $this->searchValue.'%');
        //             })
        //             ->get()
        //             ->take(4);

        return view('livewire.items.item-search-bar');
    }
}
