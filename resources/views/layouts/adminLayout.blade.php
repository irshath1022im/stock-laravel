<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">


</head>
<body>



    <div class="row">

        <div class="col-4 border border-primary p-2">
            <ul class="list-group bg-primary">
                <a href="{{ route('adminStore') }}"<li class="list-group-item">ADD STORE</li></a>
                <a href="{{ route('category.index')}}"<li class="list-group-item">ADD CATEGORY</li></a>
                <a href="{{ route('adminItems') }}"<li class="list-group-item">ADD ITEMS</li></a>
                    <li class="list-group-item">ADD RECEIVING</li>
                    <li class="list-group-item">ADD DELIVERY</li>
                    <li class="list-group-item">ADD STAFF</li>
                    <li class="list-group-item">REPORT</li>
                </ul>
        </div>


        <div class="col-8">
        @yield('content')
        </div>
    </div>




<script src="{{ asset('js/app.js') }}"/>

</body>
</html>
