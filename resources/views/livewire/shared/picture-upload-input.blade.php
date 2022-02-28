<div>
    <div wire:loading wire:target="photo">
        @component('components.spinner')
            
        @endcomponent
    </div>

    <form wire:submit.prevent="save">
        <div class="mb-3">
            <input type="file" class="form-control"  wire:model="photo">
        </div>

        @if ($photo)
            Photo Preview:
        <img src="{{ $photo->temporaryUrl() }}" class="w-50">
         @endif

         @error('photo')
             <div class="alert alert-alert" role="alert">
                 <strong>{{ $message }}</strong>
             </div>
             
         @enderror

        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Upload</button>
    </form>

</div>
