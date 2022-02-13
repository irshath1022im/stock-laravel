

@extends('layouts.adminLayout')


@section('content')


{{-- @dump($result->itemSizes) --}}
<div class="container">


    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-primary text-uppercase">{{ $item->name }} 
                <button type="button" class="btn btn-sm btn-outline-success">{{ $item->itemQty->sum('qty') }}</button></h4>
        </div>

        <div class="card-body">
         

            <div class="row">
                <div class="col-sm-4 border">
                    <img class="card-img-top img-fluid" src="{{ Storage::url('categoryCoverPhotos/Polo.png') }}" alt="">
                </div>

                <div class="col bg-light border m-2">

                    @livewire('items.item-stock-by-size', ['item_id' => $item->id])

                    <button type="button" class="btn btn-primary bg-purple100">Add</button>

                </div>

            </div>
        </div>

      
    </div>
</div>

@endsection