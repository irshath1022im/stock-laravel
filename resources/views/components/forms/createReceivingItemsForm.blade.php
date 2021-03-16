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


    <form method="POST" action="{{ isset($orderItem) ? route('receivingItems.update', ['receivingItem' => $orderItem->id]) : route('receivingItems.store') }}">
        @csrf
        @isset($orderItem)
            @method('PUT')
        @endisset

        <input type="text" hidden value="{{ $orderItem->receiving_id }}" name="receiving_id" />

    <div class="form-group">
      <label for="">Items</label>
      <select class="form-control" name="item_id" id="">
        <option value=0>Select</option>
        @foreach ($items as $item)
            <option
                value={{ $item->id}}
                >{{ $item->name}}</option>
        @endforeach
         </select>
    </div>

    <div class="form-group">
      <label for="">Qty</label>
      <input type="number"
        class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="QTY"
        value="{{old('qty', isset($orderItem) ? $orderItem->qty : null ) }}">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($orderItem) ? 'UPDATE' : 'ADD' }}</button>

</form>
</div>


@endsection

