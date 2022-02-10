
@extends('layouts.adminLayout')

@section('title', 'ITEMS')
    


@section('content')
    <div class="card">
        <div class="card-header">
            ITEMS <a href="{{ route('items.create') }}">
                <button type="button" class="btn btn-sm btn-primary">New</button>
            </a>
        </div>
        <div class="card-body">
            @livewire('items.item-index')

        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>
   

@endsection

