@extends('layouts.adminLayout')

@section('content')
    @livewire('show-store-request', ['receivingId' => $receivingId])
@endsection
