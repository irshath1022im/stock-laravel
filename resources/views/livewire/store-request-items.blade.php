<div>
    <h3>Requesting Items</h3>
    <hr />
    <div class="row border container">
        <form wire:submit.prevent="addStoreRequest">

            <div class="col form-group">
                <label for="">Item</label>
                <select class="form-control" name="item_id" id="" wire:model="item_id">
                <option value=0>Select</option>
                @foreach ($items as $item)
                <option value="{{ $item->id}}"
                    >{{ $item->name}}</option>
                @endforeach
                    </select>

                @error('item_id')
                    {{$message}}
                @enderror
            </div>

            <div class="col form-group">
                <label for="">Qty</label>
                <input type="number" wire:model="qty"
                class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="QTY"
                value="{{old('qty', $qty) }}">

                        @error('qty')
                            {{ $message}}
                        @enderror
            </div>

            <div class="form-group">
              <label for="">Remark</label>
              <input type="text" name="remark" id="" class="form-control" placeholder="remark" wire:model='remark'>
            </div>

            @error('remark')
            {{ $message}}
        @enderror

            <div>
                <button type="" class="btn btn-primary">
                    {{ $updateBtnStatus === true ? 'UPDATE' : 'SAVE' }}
                </button>
            </div>

            <input type="button" class="btn btn-sm bg-danger" wire:click="changeBtnStatus" value="clear">
    </form>
    </div>

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
                </tr>
        @empty
        <tr>
                <td>No Items Found</td>
            </tr>
        @endforelse
        </tbody>
        </table>
    </div>
</div>
