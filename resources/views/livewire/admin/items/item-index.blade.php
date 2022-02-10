<div>
    @component('components.alerts')
                
    @endcomponent

    {{-- <div>
        <h3>ITEMS </h3>
    </div> --}}

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                ITEMS
               {{-- <img src="/icons/file-plus.svg" class="" width="20em" /> --}}
            </h4>

         
        </div>

        <div class="card-body">
            <a href="">
                <button class="btn btn-sm btn-primary">ADD UNIFORM ITEMS</button>
            </a>

            <a href="{{ route('promotional-items.create') }}">
                <button class="btn btn-sm btn-secondary">ADD PROMOTIONAL ITEMS</button>
            </a>


            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Store</th>
                    <th scope="col">Qty</th>
                    </tr>
                </thead>
                  <tbody>
        
                 @forelse ($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->category}}</td>
                        <td> {{ $item->category->store->name }}
                        <td>{{$item->itemQty->sum('qty')}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" 
                            data-bs-toggle="modal" data-bs-target="#modelId" 
                                wire:click="$emit('getItemQtyBySize',{{ $item->id }})">
                                    By Size
                              </button>
                            <button class="btn btn-sm btn-outline-info">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>

                        <td>
                        {{-- <td>{{$item->initialQty}}</td> --}}
                         {{-- <form method="get" action="{{ route('items.edit', ['item'=>$item->id])}}">
                                @csrf
                            <a href="{{ route('items.edit',['item'=> $item->id]) }}">
                                <button class="btn btn-sm btn-outline-info">Edit</button></a>
        
                            </form> --}}
                      </td>
        
        
                        <td>
                            {{-- <form action="{{ route('items.destroy', ['item'=>$item->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
        
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                <img type="submit" src=" {{ asset('icons/trash-2.svg')}}" />
                            </form> --}}
        
                        </td>
                    </tr>
                 @empty
                    <tr>
                        <td>Loading....</td>
                    </tr>
                 @endforelse
        
        
        
              </tbody>
        
            </table>
        
        {{ $items->links()}}


        <!-- Button trigger modal -->
      
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   

                    <div class="modal-body">
                        @livewire('admin.items.item-by-size')
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </div>
        </div>
        

        </div>
    </div>
















</div>
