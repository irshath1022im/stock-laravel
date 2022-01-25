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

    @include('components.navbar2')

<section class="container-fluid">
    <div class="row">

        <div class="col-4 border border-primary p-2">
            <ul class="list-group bg-primary">
                <a href="{{ route('adminStore') }}"<li class="list-group-item">STORE</li></a>
                <a href="{{ route('category.index')}}"<li class="list-group-item">CATEGORY</li></a>
                <a href="{{ route('items.index') }}"<li class="list-group-item">ITEMS</li></a>
                <a href="{{ route('receiving.index')}}"><li class="list-group-item">RECEIVING</li></a>
                <a href="{{ route('storeRequest.index') }}">
                            <li class="list-group-item">STORE REQUEST</li>
                </a>
                <a href="{{ route('adminUser') }}">
                        <li class="list-group-item">STAFF</li>
                </a>
                <a href="{{ route('adminReports') }}" >
                    <li class="list-group-item">REPORT</li>
                </a>
                </ul>
        </div>


        <div class="col-8">
            @yield('content')
        </div>
    </div>

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

<script src="{{ mix('js/app.js') }}"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
