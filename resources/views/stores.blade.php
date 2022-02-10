@extends('layouts.adminLayout')

@section('content')

<div class="container">

    <h4 class="text-center">AL SHAHANIA STUD STORES</h4>

    <div class="d-flex justify-content-around flex-wrap">

    @foreach ($stores as $store)
        @component('components.store', ['store' => $store])

        @endcomponent
    @endforeach
    </div>

</div>
@endsection
