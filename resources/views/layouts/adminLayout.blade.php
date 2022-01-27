<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    @livewireStyles

</head>
<body>

    {{-- @include('components.navbar2') --}}

<section class="">

        <nav class="navbar navbar-expand-lg navbar-light bg-secondary"">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                        <img src="/images/alshahania-logo.png" alt="" class="w-50 d-inline-block align-text-top" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/">HOME</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('adminStore')}}" >STORE</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('category.index')}}" >CATEGORY</a>
                      </li>  <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('items')}}" >ITEMS</a>
                      </li>  <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('storeRequest.index')}}" >STORE REQUEST</a>
                      </li>
                    </li>  <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('receiving.index')}}" >RECEIVING</a>
                      </li>

                    </li>  <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('adminReports')}}" >REPORTS</a>
                      </li>


                @auth
                    <form method="post" action="{{ route('logout')}}">
                    @csrf
                        <button type="submit" class="btn btn-outline-danger" style="color: rgb(254,254,254);">LOGOUT</button>
                    </form>
                @endauth
   
                  
        
                    </ul>

                </div>

            </div>
        </nav>

    <section class="container mt-2">
      
     
                @yield('content')
            

    </section>

</section>
    @livewireScripts

    <script>
        window.addEventListener('closeModal', event => {
            //close the addUserModal
            $('#modalForm').modal('hide');
        })
        window.addEventListener('showModal', event => {
            //close the addUserModal
            $('#modalForm').modal('show');
        })

        window.addEventListener('openDeleteModal', event => {
            //openDelteModal
            $('#deleteModal').modal('show');
        })

        window.addEventListener('closeDeleteModal', event => {
            //openDelteModal
            $('#deleteModal').modal('hide');
        })

        window.addEventListener('openUpdateModal', event => {
            //openDelteModal
            $('#updateModal').modal('show');
        })
        </script>

<script src="{{ mix('js/app.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

</body>
</html>
