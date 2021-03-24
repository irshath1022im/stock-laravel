
@extends('layouts.adminLayout')

@section('content')

            <div>
                <h3>STORES </h3>
            </div>

              <div class="d-flex flex-wrap justify-content-around">
                @foreach ($stores as $store)

                    @component('components.storeReport', ['store'=> $store])

                    @endcomponent

                @endforeach



            </div>

    {{-- end of column --}}


@endsection
