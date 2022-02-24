<?php

namespace App\Http\Livewire\Shared;

use App\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PictureUploadInput extends Component
{

    use WithFileUploads;

    public $photo;
    public $request_id;
    public $image;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:12288', // 1MB Max
        ]);
 
        // $fileName = 
        $fileExtention = $this->photo->guessExtension();
        
        if(env('APP_ENV') !== 'local') {

         $path = Storage::disk('public')->putFileAs('categoryPicture', $this->photo, $this->image .'.'.$fileExtention);
         $this->image = $path;

        }
        else {

            $path = $this->photo->storeAs('categoryPicture',$this->request_id .'.'.$fileExtention);
            $this->image = $path;

        }

        $query = Category::where('id', $this->request_id)
        ->update(['coverPicture' => $this->image]);

        if($query){
            
            $this->emit('PhotoUploadSuccess');
         
        }

        $this->reset('photo');

        
    }

    public function mount($request_id)
    {
        $this->request_id = $request_id;

        // $query=Item::find($item_id);

        // if($query)
        // {
        //     $this->image = $query['thumbnail'];
        // }
    }

    public function render()
    {
        return view('livewire.shared.picture-upload-input');
    }
}
