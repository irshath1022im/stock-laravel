<?php

namespace App\Http\Livewire\Admin\Items;

use App\Category;
use App\Item;
use App\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Uniforms extends Component
{

  
    public function render()
    {
        


        return view('livewire.admin.items.uniforms');
    }
}
