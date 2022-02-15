<div>

    
@component('components.alerts')
    
@endcomponent
   

    <form wire:submit.prevent="AddNewItem">

        <div class="mb-3">
            <label for="" class="form-label">Item Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Item Name" aria-describedby="helpId"
                wire:model.defer="name"
            >
            @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                
            @enderror
             <small id="helpId" class="text-danger">**</small>
        </div>

       
        <div class="mb-3">
          <label for="" class="form-label">Category</label>
          <select class="form-control" name="" id="" 
            wire:model.defer="category_id"
          >
            <option>None</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->category }}</option>
                
            @endforeach
          </select>

          <small id="helpId" class="text-danger">**</small>
          @error('category_id')
          <div class="alert alert-danger" role="alert">
              <strong>{{ $message }}</strong>
          </div>
          
      @enderror
        </div>

        
        <div class="mb-3">
            <label for="" class="form-label">Store</label>
            <select class="form-control" name="" id="" 
              wire:model.defer="store_id"
            >
              <option>None</option>
              @foreach ($stores as $item)
                  <option>{{ $item->name }}</option>
                  
              @endforeach
            </select>
  
            <small id="helpId" class="text-danger">**</small>
            @error('store_id')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            
        @enderror
          </div>
  

        <button type="submit" class="btn btn-primary"
        >Submit</button>
    </form>



</div>
