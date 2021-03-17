<div>

    @component('components.notifications.notifications')

    @endcomponent

    {{-- @dump($requestId) --}}

   <div>
    <h4>Welcome To <span class="text-info"> {{ $storeRequestMode }}</span> Request</h4>
    </div>

     <form wire:submit.prevent="addStoreRequest">

        <div class="form-group">
          <label for="">Requesting Date</label>
          <input type="date" name="requesting_date" id="" class="form-control" wire:model="requesting_date">
        </div>

        @error('requesting_date')
        <div class="alert alert-danger" role="alert">
            <strong> {{ $message}}</strong>
        </div>
        @enderror



       <div class="form-group">
         <label for="">STAFF</label>
         <select class="form-control" name="staff_id" id="" wire:model="staff_id">
           <option value="0">Select</option>
           @foreach ($staffs as $item)
            <option value="{{ $item->id}}" >{{ $item->staff_name}}</option>
           @endforeach
         </select>
       </div>



       @error('staff_id')
        <div class="alert alert-danger" role="alert">
            <strong> {{ $message}}</strong>
        </div>
        @enderror

       <div class="form-group">
        <label for="">STATUS</label>
        <select class="form-control" name="status" id="" wire:model="status">
          <option value="0">Select</option>
          <option value="requested">Requested</option>
          <option value="approved">Approved</option>
        </select>
      </div>

      @error('status')
      <div class="alert alert-danger" role="alert">
          <strong> {{ $message}}</strong>
      </div>
      @enderror



         <div class="form-group">
           <label for="">Remark</label>
           <input type="textaria" name="remark" id="" class="form-control" placeholder="" aria-describedby="helpId" wire:model="remark">
         </div>

         @error('remark')
         <div class="alert alert-danger" role="alert">
             <strong> {{ $message}}</strong>
         </div>
         @enderror


      <button type="submit" class="btn btn-primary"> {{ $storeRequestMode == 'NEW' ? 'ADD REQUEST' : 'UPDATE' }}</button>

    </form>



        @if ( $storeRequestMode === 'EDIT')

                @livewire('store-request-items', ['storeRequestId' => $requestId, 'storeRequestItems' => $storeRequest->requested_items])

        @endif

        </div>

</div>
