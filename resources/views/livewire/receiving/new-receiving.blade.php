<div>

    @component('components.alerts')
        
    @endcomponent


    <div class="card">
        <div class="card-header">
            New Receiving
        </div>
        <div class="card-body">
            <form wire:submit.prevent="addToTransection">

                <div class="row">

                        <div class="col-12 col-md mb-3">
                          <label for="" class="form-label">Date</label>
                          <input type="date"
                            class="form-control"
                            wire:model="selectedDate"
                            >
                            
                            @error('selectedDate')
                                
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12 col-md mb-3">
                              <label for="" class="form-label">Transection Type</label>
                              <select class="form-control" name="" id=""
                                wire:model="selectedTypeId"
                              >
                                <option value="">Select</option>

                                @foreach ($transectionType as $item)
                                    
                                    <option value="{{ $item->id }}">{{ $item->transection }}</option>
                                @endforeach
                                
                              </select>

                              @error('selectedTypeId')
                               <div class="alert alert-danger" role="alert">
                                   <strong>{{ $message }}</strong>
                               </div>
                               
                            @enderror
                        </div>                          

                </div>

                {{-- selected tabled --}}

                {{-- <div class="card mb-3 bg-light">
                    <div class="card-header">
                        ITEMS
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Polo</td>
                                    <td>medium</td>
                                    <td>10</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Trouser</td>
                                    <td>Large</td>
                                    <td>6</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                 
                </div> --}}

{{-- 
                <div class="card">
                    <div class="card-header bg-secondary">
                        Items
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md mb-3">
                              <label for="" class="form-label">Item Name</label>
                              <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="col-12 col-md mb-3">
                                <label for="" class="form-label">Size</label>
                                <select class="form-control" name="" id="">
                                  <option>Select</option>
                                  <option>xl</option>
                                  <option>xxl</option>
                                  <option>m</option>
                                </select>
                                <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>              

                            <div class="col-12 col-md mb-3">
                                <label for="" class="form-label">Qty</label>
                                <input type="number"
                                  class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                              </div>


                        </div>
                    </div>
                   
                </div> --}}

                <div class="row">
                    
                    @livewire('items.item-search-bar')

                        @error('selectedItemId')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                                    
                    @enderror

                    <div class="col-12 col-md mb-3">
                        <label for="" class="form-label">Size</label>
                        <select class="form-control" wire:model="selectedSizeId">
                          <option value="0">Select</option>

                          @foreach ($itemSizes as $item)
                              
                          <option value="{{ $item->id }}">{{ $item->size }}</option>

                          @endforeach

                      
                        </select>
                        @error('selectedSizeId')
                                
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>

                      @enderror
                  </div>              

                    <div class="col-12 col-md mb-3">
                        <label for="" class="form-label">Qty</label>
                        <input type="number"
                          class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
                            wire:model.lazy="selectedQty"
                          >

                          @error('selectedQty')
                                
                          <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </div>

                        @enderror
                      </div>


                </div>

                <button type="submit" class="btn btn-primary">Submit</button>



            </form>
        </div>
      
    </div>
</div>
