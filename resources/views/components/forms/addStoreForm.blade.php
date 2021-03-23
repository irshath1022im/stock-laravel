


@extends('layouts.adminLayout')

@section('content')

{{-- @dump($store); --}}
    <div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form method="post" action="{{ !isset($store) ? route('store.store') : route('store.update', ['store'=>$store->id]) }}" enctype="multipart/form-data">
            @csrf
            @if (isset($store))
                @method('PUT')
            @endif
            <div class="form-group">
              <label for="">Store Name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('store', isset($store) ? $store->name :null) }}" placeholder=""         aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>

            <div class="form-group">
                <label for="">Logo</label>
                <input type="file" name="store_logo" id="store_logo" class="form-control-file" />
            </div>

            <button type="submit" name="" id="" class="btn btn-primary" btn-lg btn-block">
            {{ isset($store) ? 'UPDATE' : 'ADD' }}
            </button>
        </form>

    </div>

@endsection

