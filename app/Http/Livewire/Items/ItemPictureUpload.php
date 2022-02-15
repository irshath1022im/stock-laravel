<?php

namespace App\Http\Livewire\Items;

use App\Item;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemPictureUpload extends Component
{

    
    use WithFileUploads;

    public $photo;
    public $item_id;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:12288', // 1MB Max
        ]);
 
        // $fileName = 
        $fileExtention = $this->photo->guessExtension();
        // $path = $this->photo->storePublicly('itemCoverPhotos',$this->item_id .'.'.$fileExtention);
        $path = Storage::disk('public')->putFileAs('itemCoverPhotos', $this->photo, $this->item_id .'.'.$fileExtention);
        $query = Item::where('id', $this->item_id)
                        ->update(['thumbnail' => $path]);
        
    }

    public function mount($item_id)
    {
        $this->item_id = $item_id;
    }

    // public function render()
    // {
    //     return view('livewire.items.item-picture-upload');
    // }
}
