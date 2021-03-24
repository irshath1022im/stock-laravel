<div class="card p-3 m-2" style="width: 18rem;">
    <h5 class="card-title text-capitalize text-center">{{ $store->name}}</h5>
<img class="card-img-top" src=" {{ Storage::url($store->coverPicture)}}" alt="Card image cap">
    <div class="card-body">
        <a name="" id="" class="btn btn-primary" target="_blank"
            href="{{ route('storeReport', ['store' => $store->name])}}"
            role="button">REPORTS
        </a>
    </div>
</div>
