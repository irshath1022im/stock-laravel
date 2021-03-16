    <div>

        {{-- @dump($receiving) --}}

        {{-- {{ $receivingId}} --}}

        <div class="container">

            @if($message = session('created'))
            <div class="alert alert-success" role="alert">
              <strong>{{ $message}}</strong>
          </div>
        @endif

        @if($message = session('updated'))
        <div class="alert alert-info" role="alert">
          <strong>{{ $message}}</strong>
      </div>
    @endif

       @if(session('deleted'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session('deleted')}}</strong>
        </div>
        @endif

            <form method="POST" action="{{ isset($receiving) ? route('receiving.update', ['receiving'=> $receiving->id] ) : route('receiving.store')}}">
                    @csrf
                    @isset($receiving)
                    @method('PUT')
                    @endisset
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="receiving_date" id="receiving_date" class="form-control" placeholder="ReceivingDate" aria-describedby="helpId"
                        value="{{ old('receiving_date', isset($receiving) ? $receiving->receiving_date : null ) }}"
                    >
                            <small id="helpId" class="text-muted">Help text</small>
                </div>

                <div class="form-group">
                    <label for="">Supplier Name</label>
                    <input type="text" name="supplier_name" id="supplier_name" class="form-control" placeholder="supplier_name" aria-describedby="helpId"
                    value="{{ old('supplier_name', isset($receiving) ? $receiving->supplier_name : null )}}"
                    >
                    <small id="helpId" class="text-muted">Help text</small>
                </div>

                    <div class="d-flex">

                        <button type="submit" class="btn btn-primary">
                            {{ isset($receiving) ? 'UPDATE' : 'SAVE' }}
                        </button>

                    </div>


            </form>

            <form wire:submit.prevent= {{ $updateBtnStatus === true ? "updateItem" : "addOrder" }} }}>
                <div class="row border container">

                    <div class="col form-group">
                        <label for="">Items</label>
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
                          class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="QTY" value="{{old('qty', $qty) }}">

                                @error('qty')
                                    {{ $message}}
                                @enderror
                      </div>

                      <div>
                        <button type="submit" class="btn btn-primary">
                            {{ $updateBtnStatus === true ? 'UPDATE' : 'SAVE' }}
                        </button>
                    </br>

                      </div>

                      <input type="button" class="btn btn-sm bg-danger" wire:click="changeBtnStatus" value="clear">
                </div>
            </form>

            <div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Line Id</th>
                    <th scope="col">Receiving Id</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Qty</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($receiving->orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->receiving_id}}</td>
                            <td>{{$order->item['name']}}</td>
                            <td>{{$order->qty}}</td>
                            <td>  <img src="{{ asset('icons/edit_black_24dp.svg') }}" alt="Edit"
                                        wire:click="updateOrderItem( {{$order->item_id}}, {{ $order->qty}}, {{$order->id}})"
                                    >
                            </td>
                            <td>
                                <img src="{{ asset('icons/trash-2.svg') }}" alt="Edit" wire:click="removeReceivingItem({{ $order->id }})" />
                            </td>
                        </tr>
                  @empty
                  <tr>
                         <td>No Items Found</td>
                    </tr>
                  @endforelse
                </tbody>
                </table>

    </div>


