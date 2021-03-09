
{{-- @dump($receivings) --}}
    {{-- @foreach ($receivings as $receiving)
        {{ $receiving->id}}
    @endforeach --}}
        <h3>Receiving Details </h3>
        <hr />
    <div class="table-responsive">
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
          <tbody>


                 @foreach ($receivings as $receiving)

                    <tr>
                        <th scope="row">{{$receiving->id}}</th>
                        <td>{{ $receiving->receiving_date }}</td>
                        <td>{{ $receiving->supplier_name}}</td>
                        <td><a href="{{ route('receiving.show',['receiving' => $receiving->id ]) }}"><button class="btn btn-primary">items</button></a></td>
                        <td><a><button class="btn btn-info">Edit</button></a></td>
                    </tr>
                    @endforeach


          </tbody>
        </table>

        {{ $receivings->links() }}

        </div>


