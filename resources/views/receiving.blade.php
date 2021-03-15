
@extends('layouts.adminLayout')

@section('content')
    @foreach ($receiving as $item)
            <h3>{{ $item->receiving_date }}</h3>
            <h4>{{ $item->supplier_name }}</h4>
            <h5>{{ $item->id }}</h5>
            <hr/>

            <h4>Order Details dddd</h4>
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

<!-- Button trigger modal -->

{{--
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
