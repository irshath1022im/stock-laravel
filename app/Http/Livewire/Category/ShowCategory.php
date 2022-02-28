<?php

namespace App\Http\Livewire\Category;

use App\Category;
use Livewire\Component;

class ShowCategory extends Component
{

    public $category_id;

    protected $listeners = ['PhotoUploadSuccess'];



    public function PhotoUploadSuccess()
    {

    }


    public function mount($category_id)
    {

        $this->category_id = $category_id;
    }

    public function render()
    {
        $result = Category::find($this->category_id);
        return view('livewire.category.show-category',['category' => $result]);
    }
}
