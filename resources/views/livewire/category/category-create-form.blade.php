<div>

    @component('components.alerts')
        
    @endcomponent

    <div wire:loading>
        @component('components.spinner')
            
        @endcomponent
    
    </div>


    <form wire:submit.prevent="save" wire:loading.remove>

        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text"
            class="form-control" placeholder="Category Name" wire:model.defer="category">

            @error('category')
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                
            @enderror
        </div>





        <div class="mb-3">
          <label for="" class="form-label">Store</label>
          <select class="form-control" name="" id="" wire:model.defer="store_id">
            <option value="">Select</option>
            <option value="1">Uniform</option>
            <option value="2">Promotion</option>
          </select>

          @error('store_id')
          <div class="alert alert-warning" role="alert">
              <strong>{{ $message }}</strong>
          </div>
          
      @enderror
        </div>


        <button type="submit" class="btn btn-dark">Submit</button>

    </form>

</div>
