@extends('layouts.adminLayout')

@section('title', 'Category')
    

@section('content')

    @livewire('category.show-category', ['category_id' => $category_id])

@endsection