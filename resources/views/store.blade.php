@extends('layout')

@section('content')

{{-- @dump($result) --}}



    <div class="container">


           <div class="d-flex justify-content-around flex-wrap">
            @foreach ($result as $category)


            <div class="card p-3 m-2" style="width: 16rem;">


                <a href="#">
                    <h5 class="card-title text-uppercase text-center">
                        {{ $category['category']}}
                    </h5>
                </a>

                <img class="card-img-top" src="{{ Storage::url($category['coverPicture'])}} " alt="Card image cap">

                {{-- card body --}}
                        @forelse ($category['items'] as $item)
                            @component('components.categoryItemsQty', ['item' => $item])

                            @endcomponent

                            @empty

                                <div class="alert alert-primary" role="alert">
                                    <strong>No Items Found ...</strong>
                                </div>

                        @endforelse

                </div>
                @endforeach
            </div>


    </div>


@endsection
