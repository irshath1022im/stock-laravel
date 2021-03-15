@extends('layouts.adminLayout')

@section('content')

    @component('components.receiving.receiving', ['receivings' => $receivings])

    @endcomponent

    {{-- @livewire('receiving-livewire') --}}


@endsection
