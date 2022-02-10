<div>
    
    <ul class="list-group">
        @foreach ($stores as $item)
        <li class="list-group-item" data-bss-hover-animate="pulse">
            <div class="form-check">
                <input class="form-check-input" type="radio"
                 name= "selectedStore" value="{{ $item->id}} "
                    {{-- wire:model="selectedStore"  --}}
                    wire:click="$emit('selectStore', {{ $item->id }} )"
                >
                <label class="form-check-label text-uppercase" for="formCheck-1"
                style="color: rgb(71,66,66);font-family: Antic, sans-serif;font-weight: bold;">
                    {{$item->name}}</label>
            </div>
        </li>

        @endforeach
    </ul>

</div>
