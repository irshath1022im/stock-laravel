@extends('layouts.adminLayout')

@section('content')

    {{-- @dump($receiving) --}}
    @livewire('edit-receiving', ['receivingId' => $receivingId])
@endsection
