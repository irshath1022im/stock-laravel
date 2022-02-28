<?php

namespace App\Http\Livewire\Category;

use App\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CategoryCreateForm extends Component
{
    public $category;
    public $store_id;
    public $coverPicture;
    public $category_id;

    protected $rules=[
        'category' => 'required',
        'store_id' => 'required',
        'coverPicture' => ''
    ];

    protected $listeners=['closeBtnClicked', 'editCategoryRequest'];

    public function closeBtnClicked()
    {
        $this->reset();
        $this->resetValidation();
        $this->emit('categoryCreateFormSubmited');

    }


    public function save()
    {
       $validated = $this->validate();

       $fileName = $this->coverPicture;

    //    $path = Storage::disk('public')->putFileAs('categoryCoverPhotos', $this->coverPicture,  )

        Category::create($validated);

        session()->flash('success', 'Category has been created');
        $this->reset();

    }

    public function editCategoryRequest()
    {
        $this->category = 'test';
    }

    public function mount($category_id)
    {
        $this->reset();
        $this->category_id = $category_id;

    }

    public function render()
    {
        return view('livewire.category.category-create-form');
    }
}
