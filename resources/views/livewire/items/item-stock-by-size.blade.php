<div>


{{-- 
    <div>

        @component('components.spinner')
            
        @endcomponent

    </div> --}}

    {{-- @dump($itemQty) --}}

    @if (count($itemQty) > 0)
       
        <div
            class="accordion accordion-flush" id="accordionFlushExample">

            {{-- @dump($itemQty) --}}
            @foreach ($itemQty as $item)
                
        
                <div class="accordion-item" 
                    wire:click="$emit('sendSizeId', {{ $item_id }}, {{ $item->size_id }})"
                >
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#flush-{{ $item->size_id }}" 
                        aria-expanded="false" 
                        aria-controls="flush-collapseOne">
                        
                    <span class="text-uppercase">{{ $item->size->size }}</span>
                    <span class="btn btn-outline-primary m-2">{{ $item->total }}</span>
                </h2>

                <div id="flush-{{ $item->size_id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        @livewire('items.item-transections')

                    </div>
                </div>
                </div>

            @endforeach

           

        </div>


        @else

       @component('components.notifications.empty')
           
       @endcomponent
       
   @endif


















</div>
