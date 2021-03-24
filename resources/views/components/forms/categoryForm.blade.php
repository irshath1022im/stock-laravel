@extends('layouts.adminLayout')

@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- @dump($category) --}}
    <form method="POST"
    action="{{ isset($category) ? route('category.update',['category'=>$category->id]) : route('category.store') }}"
    enctype="multipart/form-data"
    >
        @csrf

        @isset($category)
             @method('PUT')
        @endisset
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="category" id="category" class="form-control" placeholder="New Category" aria-describedby="helpId"
                value="{{ old('category', isset($category) ? $category->category :null) }}">
              <small id="helpId" class="text-muted">Help text</small>
            </div>

           <div class="form-group">
             <label for="">Store</label>
             <select class="form-control" name="store_id" id="store_id" >
                <option value=0>Select</option>
                 @foreach ($stores as $store)
                     <option value={{$store->id}}
                        {{ isset($category) && $category['store_id'] == $store->id ?? 'selected' }}
                     >{{ $store->name}}</option>
                 @endforeach
             </select>
           </div>

           <div class="form-group">
             <label for="">Logo</label>
             <input type="file" name="category_logo" id="" class="form-control-file"
             value="{{ old('category_logo', isset($category) ? $category->coverPicture :null) }}">
           </div>

           <button type="submit" class="btn btn-primary">
               {{ isset($category) ? 'UPDATE' : 'SAVE' }}</button>

    </form>
</div>
@endsection
