@extends('layouts.adminLayout')

@section('content')
    @livewire('edit-store-request', ['storeRequestId' => $storeRequestId])
@endsection
