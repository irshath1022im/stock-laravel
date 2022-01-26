
@extends('layouts.adminLayout')

@section('content')

            @component('components.alerts')
                
            @endcomponent

            {{-- <div>
                <h3>ITEMS </h3>
            </div> --}}

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        ITEMS
                       {{-- <img src="/icons/file-plus.svg" class="" width="20em" /> --}}
                    </h4>

                 
                </div>

                <div class="card-body">
                    <a href="{{ route('items.create') }}">
                        <button class="btn btn-sm btn-primary">ADD UNIFORM ITEMS</button>
                    </a>

                    <a href="{{ route('promotional-items.create') }}">
                        <button class="btn btn-sm btn-secondary">ADD PROMOTIONAL ITEMS</button>
                    </a>

                    @component('components.items', ['items'=> $items])

                    @endcomponent

                    
    
                </div>
            </div>


              {{-- @livewire('admin.store') --}}
              {{-- <div>

                <div>
                    <div class="input-group mb-3">
                        <a name="" id="" class="btn btn-primary" href="{{ route('items.create') }}"role="button">NEW ITEM</a>
                    </div>
                </div>

             
            </div> --}}

    {{-- end of column --}}


@endsection
