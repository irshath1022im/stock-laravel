@extends('layouts.adminLayout')

@section('content')
    @component('components.storeRequest.indexStoreRequest', ['storeRequests' => $storeRequests])

    @endcomponent
@endsection
