<?php

namespace App\Http\Livewire\Items;

use App\Category;
use App\Item;
use App\Store;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemCreate extends Component
{

    public $name;
    public $category_id;
    public $categories=[];

    use WithFileUploads;

    protected $rules= [
        'name' => 'required',
        'category_id' => 'required',
    ];


    

    public function AddNewItem()
    {


       $validated = $this->validate();


        Item::create($validated);

        session()->flash('success', 'Item Has been added');
        $this->reset();


    }

    public function mount()
    {
        $this->categories = Category::get();
        $this->stores = Store::get();
    }

    public function render()
    {
        return view('livewire.items.item-create');
    }
}
