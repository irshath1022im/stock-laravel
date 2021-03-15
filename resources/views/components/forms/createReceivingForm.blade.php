@extends('layouts.adminLayout')

@section('content')

{{-- @dump($receiving) --}}

{{-- @dump(isset($receiving)) --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($message = session('updated'))
<div class="alert alert-info" role="alert">
      <strong>{{ $message}}</strong>
  </div>
@endif



<div class="container">

    <form method="POST" action="{{ isset($receiving) ? route('receiving.update', ['receiving'=> $receiving->id] ) : route('receiving.store')}}">
            @csrf
            @isset($receiving)
            @method('PUT')
            @endisset
        <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="receiving_date" id="receiving_date" class="form-control" placeholder="ReceivingDate" aria-describedby="helpId"
                value="{{ old('receiving_date', isset($receiving) ? $receiving->receiving_date : null ) }}"
            >
                    <small id="helpId" class="text-muted">Help text</small>
        </div>

        <div class="form-group">
            <label for="">Supplier Name</label>
            <input type="text" name="supplier_name" id="supplier_name" class="form-control" placeholder="supplier_name" aria-describedby="helpId"
            value="{{ old('supplier_name', isset($receiving) ? $receiving->supplier_name : null )}}"
            >
            <small id="helpId" class="text-muted">Help text</small>
        </div>

        <div class="d-flex">

            <button type="submit" class="btn btn-primary">
                {{ isset($receiving) ? 'UPDATE' : 'SAVE' }}
            </button>

        </div>

    </form>


    <hr />
        @isset($receiving)
            @component('components.receiving.orderItems', ['receiving' => $receiving])

            @endcomponent


        @endisset


</div>

    @isset($receiving)
    <div>
        <form method="POST" action="{{ route('receiving.destroy',['receiving'=> $receiving->id]) }}">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger">REMOVE RECEIVING</button>
        </form>
    </div>
    @endisset


@endsection

