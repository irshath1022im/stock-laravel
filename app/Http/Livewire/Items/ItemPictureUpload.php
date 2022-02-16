<?php

namespace App\Http\Livewire\Items;

use App\Item;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemPictureUpload extends Component
{

    
    use WithFileUploads;

    public $photo;
    public $item_id;
    public $image;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:12288', // 1MB Max
        ]);
 
        // $fileName = 
        $fileExtention = $this->photo->guessExtension();
        
        if(env('APP_ENV') !== 'local') {

         $path = Storage::disk('public')->putFileAs('itemCoverPhotos', $this->photo, $this->image .'.'.$fileExtention);
         $this->image = $path;

        }
        else {

            $path = $this->photo->storeAs('itemCoverPhotos',$this->item_id .'.'.$fileExtention);
            $this->image = $path;

        }

        $query = Item::where('id', $this->item_id)
                        ->update(['thumbnail' => $this->image]);

       

        $this->reset('photo');

        

       
        
    }

    public function mount($item_id)
    {
        $this->item_id = $item_id;

        $query=Item::find($item_id);

        if($query)
        {
            $this->image = $query['thumbnail'];
        }
    }

    public function render()
    {
        return view('livewire.items.item-picture-upload');
    }
}
