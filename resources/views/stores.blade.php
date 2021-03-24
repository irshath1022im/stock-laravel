@extends('layout')

@section('content')

<div class="container">

    <h4 class="text-center">Welcome to Stores</h4>

    <div class="d-flex justify-content-around flex-wrap">
    @foreach ($stores as $store)
        <div class="card p-3 m-2" style="width: 18rem;">
            <h5 class="card-title text-capitalize">{{ $store->name}}</h5>
        <img class="card-img-top" src=" {{ Storage::url($store->coverPicture)}}" alt="Card image cap">
            <div class="card-body">
                <a name="" id="" class="btn btn-primary"
                    href="{{ route('storeSummary', ['store_type' => $store->name])}}"
                    role="button">Items
                </a>
            </div>
        </div>
    @endforeach
    </div>

</div>
@endsection
