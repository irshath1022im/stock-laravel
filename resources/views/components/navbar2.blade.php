<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background: #37434d;">
    <div class="container">
        <img src="{{ asset('images/alshahania-logo.png')}}" style="width: 246px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('homePage2') }}" class="nav-link"
                    style="color: rgb(247, 247, 247);">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link" href="#" style="color: rgb(254,254,254);">ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" style="color: rgb(254,254,254);">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
