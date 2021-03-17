

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

    <h3>Store Request Details</h3>
    <hr />

    <div class="input-group mb-3">
       <a href="{{ route('storeRequest.create')}}">
            <button type="button" class="btn btn-primary btn" role="button">NEW REQUEST</button>
       </a>
    </div>



        <div class="accordion" id="accordionExample">
            @foreach ($storeRequests as $request)
            <div class="card">
              <div class="card-header d-flex" id="headingTwo">
                  <div>
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#test{{$request->id}}" aria-expanded="false" aria-controls="test{{$request->id}}">
                        {{ $request->id}} /{{ $request->requesting_date }} /{{ $request->staff->staff_name}} / {{ $request->status}}
                    </button>
                    </h2>
                  </div>

                    <div>

                    <a href=" {{ route('storeRequest.edit',['storeRequest'=> $request->id]) }}">
                        <img src="{{ asset('icons/edit_black_24dp.svg') }}" alt="Edit">
                    </a>

                    </div>
              </div>

              <div id="test{{$request->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                <div class="card-body">

                    @component('components.storeRequest.storeRequestItems', ['storeRequests' => $storeRequests])

                    @endcomponent

                </div>
              </div>
            </div>
            @endforeach
          </div>

          {{ $storeRequests->links()}}
