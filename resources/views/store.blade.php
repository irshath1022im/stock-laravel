@extends('layout')

@section('content')

{{-- @dump($stores) --}}



    <div class="container">
       @foreach ($data as $store)
           {{-- {{ $item->category}} --}}

           <div class="d-flex justify-content-around flex-wrap">
            @foreach ($store->category as $singleCategory)
                    {{-- @dump($singleCategory->category, $item->name) --}}

                @component('components.categoryItemsQty', ['singleCategory' => $singleCategory])

                @endcomponent

            @endforeach

            </div>

       @endforeach
    </div>


@endsection
