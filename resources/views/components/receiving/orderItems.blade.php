<h4>Order Details</h4>
{{-- @dump($receiving->orders) --}}
{{-- {{
    session(['id' => '10'])
}} --}}

{{-- @dump(Session::all()) --}}
        <div>
            <a name="" id="" class="btn btn-primary" href="{{ route('receivingItems.edit',['receivingItem' => 10]) }}" role="button">ADD NEW ITEM</a>

        </div>
                        <div class="table-responsive">
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
                                </tr>
                          @empty
                          <tr>
                                 <td>No Items Found</td>
                            </tr>
                          @endforelse
                        </tbody>
                        </table>
</div>

