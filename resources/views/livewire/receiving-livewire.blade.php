
{{-- @dump($receivings) --}}
    {{-- @foreach ($receivings as $receiving)
        {{ $receiving->id}}
    @endforeach --}}

    {{-- @dump($orderItems); --}}
        <h3>Receiving Details </h3>
        <hr />
    {{-- <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Supplier</th>
              <th scope="col">Items</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody> --}}


            <div class="accordion" id="accordionExample">
                @foreach ($receivings as $receiving)
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#test{{$receiving->id}}" aria-expanded="false" aria-controls="test{{$receiving->id}}">
                        {{ $receiving->receiving_date }} /{{ $receiving->supplier_name}}
                      </button>
                    </h2>
                  </div>
                  <div id="test{{$receiving->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                     test2
                    </div>
                  </div>
                </div>
                @endforeach
              </div>

              {{-- {{ $receivings->links() }} --}}

                    {{-- {{-- <tr>
                        <th scope="row">{{$receiving->id}}</th>
                        <td>{{ $receiving->receiving_date }}</td>
                        <td>{{ $receiving->supplier_name}}</td>
                        <td><a href="{{ route('receiving.show',['receiving' => $receiving->id ]) }}"><button class="btn btn-primary">items</button></a></td>
                        <td><button class="btn btn-primary" wire:click="displayOrderItems">items</button></td>
                        <td><a><button class="btn btn-info">Edit</button></a></td>
                    </tr>


          </tbody>
        </table>
    }}
    {{$receivings->links() }}

   {{ div}} --}}
