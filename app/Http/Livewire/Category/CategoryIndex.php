<?php

namespace App\Http\Livewire\Category;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{

    use WithPagination;
    
    
    protected $listeners =['categoryCreateFormSubmited'];
    protected $paginationTheme = 'bootstrap';


    public function categoryCreateFormSubmited()
    {

    }


    public function render()
    {

        $result = Category::simplePaginate(5);
        return view('livewire.category.category-index',['categories' => $result]);
    }
}
