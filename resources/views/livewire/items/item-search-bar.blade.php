
<div class="col-12 col-md mb-3">
        <label for="" class="form-label">Item Name</label>
        <input type="text" class="form-control mb-2" 
            wire:model.debounce.500="searchValue"
            >
        

          <ul class="list-group mb-2">

            @empty($searchResult)
                

             @else
         

                    @foreach ($searchResult as $item)
                        
                
                    <li class="list-group-item bg-blue400">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                                value="{{ $item->name }}"
                                wire:click="selectedValue({{ $item }})"
                            >
                            <label class="form-check-label" for="flexRadioDefault1">
                            {{ $item->name }}
                            </label>
                        </div>
                    </li>
                    @endforeach

            @endempty

        </ul>

    <div wire:loading>
        @component('components.spinner')
            
        @endcomponent

    </div>
        



</div>

