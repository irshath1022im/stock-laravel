<div class="card p-3 m-2" style="width: 16rem;">

    <a href="#">    <h5 class="card-title text-uppercase text-center">
            {{ $singleCategory->category}}
        </h5>
    </a>

    <img class="card-img-top" src=" {{ asset('assets/images/tyre.jpg')}}" alt="Card image cap">
        <div class="card-body">
            <ul class="list-group">
                {{-- {{ $singleCategory->item}} --}}

               @forelse ($singleCategory->item  as $item)
                <button type="button" class="btn btn-primary m-1">
                    {{ $item->name}}
                <span
                class="badge {{ $item->itemSummary['Balance'] > 0 ? 'badge-success' : 'badge-danger' }} ">
                {{ $item->itemSummary['Balance']}}
                </span>
                {{-- @dump($item->itemSummary['Balance']) --}}
                </button>

                @empty
                    <div class="alert alert-primary" role="alert">
                        <strong>No Items Found ...</strong>
                    </div>
                @endforelse


              </ul>
        </div>
    </div>
