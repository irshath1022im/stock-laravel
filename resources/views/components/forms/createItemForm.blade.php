@extends('layouts.adminLayout')

@section('content')


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">

    <form method="POST" action="{{ !isset($item) ? route('items.store') : route('items.update', ['item'=>$item->id]) }}">
        @csrf
        @isset($item)
        {{-- @method('PUT') --}}
    @endisset

    <div class="form-group">
        <label htmlFor="formGroupExampleInput">Item Name</label>
        <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Item Name"
            value="{{ old('name',  isset($item) ? $item->name : null) }}"/>
    </div>

    <div class="form-group">
        <label htmlFor="formGroupExampleInput2">InitialQtyl</label>
        <input type="number" class="form-control" name="initialQty" id="formGroupExampleInput2" placeholder="Initial Qty"
            value={{ old('initialQty',isset($item) ? $item->initialQty : null ) }} />
    </div>

    <div class="form-group">
        <label htmlFor="formGroupExampleInput2">Category</label>
            <select class="form-control" name="category_id">
                <option value="">Select</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                    {{ isset($item) && $item->category_id == $category->id ? 'selected' : null}}>{{$category->category}}</option>
                @endforeach
            </select>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">
            {{ isset($item) ? 'UPDATE' : 'SAVE' }}
        </button>
    </div>


    </form>

</div>

@endsection
