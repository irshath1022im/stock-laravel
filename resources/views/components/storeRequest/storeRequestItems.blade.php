<h4>REQUEST DETAILS</h4>
{{-- @dump($receiving->orders) --}}
{{-- {{
    session(['id' => '10'])
}} --}}

{{-- @dump(Session::all()) --}}
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
                          @forelse ($storeRequests[0]->requested_items as $order)
                          {{-- @dump($order) --}}
                               <tr>
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
                          @endforelse
                        </tbody>
                        </table>
</div>

