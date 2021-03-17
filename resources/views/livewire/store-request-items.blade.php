    <button class="btn btn-sm btn-success" wire:click=>
        ADD NEW ITEM
    </button>
    
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">LINE ID</th>
            <th scope="col">Item Name</th>
            <th scope="col">Qty</th>
            <th scope="col">Remark</th>
            </tr>
        </thead>
        <tbody>

        {{-- @dump($storeRequestItems) --}}

        @forelse ($storeRequestItems as $order)
                 <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->item->name}}</td>
                    <td>{{$order->qty}}</td>
                    <td>{{$order->remark}}</td>
                    <td><img src="{{ asset('icons/trash-2.svg')}} " 
                        wire:click="$emit('removeStoreRequestItem', {{ $order->id}})"/></td>
                </tr>
        @empty 
        <tr>
                <td>No Items Found</td>
            </tr>
        @endforelse
        </tbody>
        </table>
    </div>

