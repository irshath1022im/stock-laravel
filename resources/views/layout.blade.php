<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />

</head>
<body>

    @include('components.navbar')

      @if (session()->has('success'))
      <div class="alert alert-info" role="alert">
          <strong>{{ session()->get('success')}}</strong>
      </div>

        @endif
    <hr />

@yield('content')



    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
