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


<div class="container">
        <div>We are adding new order items for the Receiving id : <span class="text text-bold">10</span></div>
        <hr />

    <form method="POST" action="{{ route('receivingItems.store') }}">
        @csrf

    <div class="form-group">
      <label for="">Items</label>
      <select class="form-control" name="item_id" id="">
        <option value=0>Select</option>
        @foreach ($items as $item)
            <option value={{ $item->id}}
                >{{ $item->name}}</option>
        @endforeach
         </select>
    </div>

    <div class="form-group">
      <label for="">Qty</label>
      <input type="number"
        class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="QTY" value="{{old('qty')}}">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <button type="submit" class="btn btn-primary">ADD</button>
    <button type="submit" class="btn btn-secondary">UPDATE</button>
</form>
</div>


@endsection

