

<div>
    <h4>Welcome To Store Request</h4>
</div>

{{-- @dump($items) --}}

<div>
    {{-- <form wire:submit.prevent="addStoreRequest"> --}}

        {{-- <div class="form-group">
          <label for="">Requesting Date</label>
          <input type="date" name="requesting_date" id="" class="form-control" wire:model="requesting_date">
        </div>

        @error('staff_id')
        {{$message}}
 @enderror
       <div class="form-group">
         <label for="">STAFF</label>
         <select class="form-control" name="staff_id" id="" wire:model="staff_id">
           <option>Select</option>
           <option>staff1</option>
           <option>staff2</option>
         </select>
       </div>

       @error('requesting_date')
                {{$message}}
         @enderror --}}

       {{-- <button type="submit"> ADD REQUEST</button>

    </form> --}}

    <form>
        {{ $test}}
        <input type="text" name="test" wire:model="test" />
    </form>

        {{-- <br />
       <h3>Requesting Items</h3>
       <hr />




        <div class="row border container">

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

              <div>
                <button type="" class="btn btn-primary">
                    {{ $updateBtnStatus === true ? 'UPDATE' : 'SAVE' }}
                </button>
            </br>

              </div>

              <input type="button" class="btn btn-sm bg-danger" wire:click="changeBtnStatus" value="clear">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">LINE ID</th>
                <th scope="col">STORE REQUEST ID</th>
                <th scope="col">STAFF NAME</th>
                <th scope="col">Item Name</th>
                <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>

                {{-- @dump($storeRequests[0]->requested_items) --}}
              {{-- @forelse ($storeRequests[0]->requested_items as $order) --}}
              {{-- @dump($order) --}}
                   {{-- <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->store_request_id}}</td>
                        <td>{{$storeRequests[0]->staff->staff_name}}</td>
                        <td>{{$order->item->name}}</td>
                        <td>{{$order->qty}}</td>
                    </tr>
              @empty
              <tr>
                     <td>No Items Found</td>
                </tr>
              @endforelse --}}
            {{-- </tbody>
            </table> --}}




</div>
