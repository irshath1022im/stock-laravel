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
       



      <div class="card">
        <div class="card-header">
            ITEMS 
              @auth
                  <button type="button" class="btn btn-primary btn-sm" 
                    data-bs-toggle="modal" data-bs-target="#createItemModal"
                    
                  >
                    New Item
                  </button>
              @endauth
           
        </div>

        <div class="card-body">

          <div class="row">

                @foreach ($items as $item)

                  <div class="col-md-6 col-lg-3 m-2">
                      @component('components.items.itemCard', ['item' => $item])
                          
                      @endcomponent
                  </div>

               @endforeach

          </div>

        </div>


      

       
    </div>

    {{ $items->links() }}




       

        <!-- Modal -->
        <div class="modal fade" id="createItemModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                @livewire('items.item-create')
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>




</div>
    