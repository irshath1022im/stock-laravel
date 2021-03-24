
@component('components.notifications.notifications')

@endcomponent

<div>
    welcome to single request Id {{ $requestId}}
</div>

<div>

   @forelse ($storeRequest as $item)
      <li> Name: {{ $item->staff->staff_name}} </li>
      <li> Requested Date: {{ $item->requesting_date}} </li>
      <li> Status: {{ $item->status}} </li>

      <br>
      <hr/>
      {{-- @component('components.storeRequest.storeRequestItems',['storeRequests'=> $storeRequest]))

      @endcomponent --}}

      @livewire('store-request-items', [
          'storeRequestId' =>  $requestId,
          'storeRequestItems' => $item->requested_items ])
        @empty
       <div class="alert alert-primary" role="alert">
           <strong>No Data Found...</strong>
       </div>
   @endforelse

</div>
