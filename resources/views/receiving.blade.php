
@extends('layouts.adminLayout')

@section('content')
    @foreach ($receiving as $item)
            <h3>{{ $item->receiving_date }}</h3>
            <h4>{{ $item->supplier_name }}</h4>
            <h5>{{ $item->id }}</h5>
            <hr/>

            <h4>Order Details</h4>
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
                  @forelse ($item->orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->receiving_id}}</td>
                            <td>{{$order->item_id}}</td>
                            <td>{{$order->qty}}</td>
                        </tr>
                  @empty
                  <tr>
                         <td>Loading</td>
                    </tr>
                  @endforelse
            </tbody>
            </table>
    </div>
    @endforeach

@endsection
