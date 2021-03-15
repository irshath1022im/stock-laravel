

   @if($message = session('stored'))
   <div class="alert alert-success" role="alert">
         <strong>{{ $message}}</strong>
     </div>
 @endif

     @if($message = session('updated'))
   <div class="alert alert-info" role="alert">
         <strong>{{ $message}}</strong>
     </div>
 @endif


  
     @if($message = session('deleted'))
   <div class="alert alert-danger" role="alert">
         <strong>{{ $message}}</strong>
     </div>
 @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h3>Receiving Details</h3>
    <hr />

    <div class="input-group mb-3">
       <a href="{{ route('receiving.create')}}">
            <button type="button" class="btn btn-primary btn" role="button">NEW RECEIVING</button>
       </a>
    </div>



        <div class="accordion" id="accordionExample">
            @foreach ($receivings as $receiving)
            <div class="card">
              <div class="card-header d-flex" id="headingTwo">
                  <div>
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#test{{$receiving->id}}" aria-expanded="false" aria-controls="test{{$receiving->id}}">
                        {{ $receiving->receiving_date }} /{{ $receiving->supplier_name}}
                    </button>
                    </h2>
                  </div>

                    <div>

                        {{-- {{ for edit {{ route('receiving.edit',['receiving'=> $receiving->id]) }}}} --}}
                    <a href="{{ route('receiving.edit',['receiving'=> $receiving->id]) }}">
                        <img src="{{ asset('icons/edit_black_24dp.svg') }}" alt="Edit">
                    </a>

                    </div>
              </div>

              <div id="test{{$receiving->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                <div class="card-body">

                    @component('components.receiving.orderItems', ['receiving' => $receiving])

                    @endcomponent

                </div>
              </div>
            </div>
            @endforeach
          </div>

          {{ $receivings->links()}}



