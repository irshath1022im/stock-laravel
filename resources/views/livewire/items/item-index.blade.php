<div class="container">
    {{-- @dump($items, $sortBy) --}}
    
    
    
          {{-- search menu --}}
            {{-- <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Sort By</label>
                        <select class="form-control" name="" id="" wire:model="sortBy">
                          <option value="id">ID</option>
                          <option value="name">Name</option>
                          <option value="balance">Stock</option>
                        </select>
                      </div>
                </div>
    
                <div class="col">
                    <div class="form-group">
                        <label for="">Order Direction</label>
                        <select class="form-control" name="" id="" wire:model="sortDirection">
                          <option value="asc">ASC</option>
                          <option value="desc">DESC</option>
                        </select>
                      </div>
                </div>
    
                <div class="col">
                    <div class="form-group">
                        <div class="form-group">
                          <label for="">Search In Item</label>
                          <input type="text" class="form-control" name="searchByItem_name" id="" aria-describedby="helpId" placeholder="Search In Item" wire:model.debound.500ms="searchByItem_name">
                        </div>
                      </div>
                </div>
    
            </div> --}}
        {{-- end of row --}}
       


    <div class="row">
      
        @foreach ($items as $item)
            
       

            <div class="col-md-6 col-lg-3 m-2">
                @component('components.items.itemCard', ['item' => $item])
                    
                @endcomponent
            </div>

        @endforeach

       
    </div>

    {{ $items->links() }}











</div>
    