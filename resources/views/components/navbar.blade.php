
<ul class="nav justify-content-center fixed-top bg-info mb-3 pb-3 ">
    <li class="nav-item">
        <a class="nav-link   text-white" href="{{ route('store.index') }}">
            HOME
        </a>
    </li>

    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                STORES
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item"
                        href="{{ route('storeSummary', ['store_type' => 'uniform']) }}">
                        UNIFORM
                    </a>
                    <a class="dropdown-item"  href="{{ route('storeSummary', ['store_type' => 'promotion']) }}">PROMOTION
                    </a>
    </li>



        <li class="nav-item">
            <a class="nav-link  text-white" href="{{ route('items')}}">ITEMS</a>
        </li>


        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                REPORTS
                </a>

                <div class="dropdown-menu">

                    <a class="dropdown-item"
                        target="_blank"
                        href="{{ route('storeReport', ['store' => 'uniform']) }}">
                        UNIFORM
                    </a>

                    <a class="dropdown-item"  href="{{ route('storeReport', ['store' => 'promotion']) }}"
                        target="_blank"
                        >
                        PROMOTION
                    </a>
                </div>
        </li>

        <li class="nav-item">
                <a class="nav-link  text-white" href="{{ route('admin')}}">ADMIN</a>
        </li>


</ul>
