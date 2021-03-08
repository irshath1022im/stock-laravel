@extends('layouts.adminLayout')
@section('content')

<div class="container-fluid row">

    <div class="col-4 border border-primary p-2">
        @component('components.Admin.leftMenu')

        @endcomponent
    </div>

    <div class="col-8">
        from adminCategory
    </div>

</div>
@endsection
