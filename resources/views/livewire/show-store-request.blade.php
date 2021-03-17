
@component('components.notifications.created')

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
      <h4>Order Items</h4>
      @component('components.storeRequest.storeRequestItems',['storeRequests'=> $storeRequest]))

      @endcomponent
   @empty
       <div class="alert alert-primary" role="alert">
           <strong>No Data Found...</strong>
       </div>
   @endforelse

</div>
