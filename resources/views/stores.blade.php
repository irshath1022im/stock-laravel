@extends('layout')

@section('content')

<div class="container">

    <h4 class="text-center">Welcome to Stores</h4>

    <div class="d-flex justify-content-around flex-wrap">
    @foreach ($stores as $store)
        @component('components.store', ['store' => $store])

        @endcomponent
    @endforeach
    </div>

</div>
@endsection
