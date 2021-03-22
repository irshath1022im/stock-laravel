
@extends('layouts.adminLayout')

@section('content')

            <div>
                <h3>ITEMS </h3>
            </div>

            @if($message = session('message'))
                <div class="alert alert-success" role="alert">
                  <strong>{{ $message}}</strong>
              </div>
            @endif

            @if($message = session('updated'))
            <div class="alert alert-info" role="alert">
              <strong>{{ $message}}</strong>
          </div>
        @endif

           @if(session('deleted'))
            <div class="alert alert-danger" role="alert">
                <strong>{{ session('deleted')}}</strong>
            </div>
            @endif


              {{-- @livewire('admin.store') --}}
              <div>

                <div>
                    <div class="input-group mb-3">
                        <a name="" id="" class="btn btn-primary" href="{{ route('items.create') }}"role="button">NEW ITEM</a>
                    </div>
                </div>

                @component('components.items', ['items'=> $items])

                @endcomponent

            </div>

    {{-- end of column --}}


@endsection
