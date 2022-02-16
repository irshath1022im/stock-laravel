<div class="card">
        <div class="card-header">
            <h4 class="card-title text-uppercase">{{ $item->name }}
               <span class="badge bg-success">{{ $item->itemQty->sum('qty') }}</span>
            </h4>
        </div>

        
        <div class="card-body">

          @empty($item->thumbnail)
          {{-- <img class="card-img-top" src="{{ Storage::URL('') }}" alt=""> --}}
          @endempty


         
        </div>

        <div class="card-footer">
          <a href="{{ route('items.show', ['item' => $item->id]) }}">
            <span class="badge bg-success">More Info</span>
          </a>
        </div>
    </div>