@extends('layouts.app2')

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


<section class="register-photo">


    <div class="form-container">

<div style="text-align: center;"><img src="{{ asset('images/LogoStoreRequest.png')}}"></div>

        <form method="post" action="{{ route('register')}}">
            @csrf
          
            <h2 class="text-center"><strong>Create</strong> an account.</h2>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="First Name" value="{{ old('name')}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email')}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" >
            </div>
            <div class="form-group"><input class="form-control" type="password" name="password_confirmation" placeholder="Password (repeat)"></div>
            <div class="form-group">
                <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div><a class="already" href="#">You already have an account? Login here.</a>
        </form>
    </div>
</section>
    
@endsection