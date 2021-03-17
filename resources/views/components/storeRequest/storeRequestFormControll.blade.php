@extends('layouts.adminLayout')

@section('content')



  @if ( isset($storeRequestId))
        @livewire('store-request-livewiere',['storeRequestId' => $storeRequestId])
@else
    @livewire('store-request-livewiere',['storeRequestId' => null])

    @endif

@endsection
