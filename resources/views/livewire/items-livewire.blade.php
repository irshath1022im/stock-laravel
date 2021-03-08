<div class="container">
{{-- @dump($items, $sortBy) --}}


    <div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Sort By</label>
                    <select class="form-control" name="" id="" wire:model="sortBy">
                      <option value="id">ID</option>
                      <option value="name">Name</option>
                      <option value="Balance">Stock</option>
                    </select>
                  </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="">Order Direction</label>
                    <select class="form-control" name="" id="" wire:model="sortDirection">
                      <option value="asc">ASC</option>
                      <option value="desc">DESC</option>
                    </select>
                  </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <div class="form-group">
                      <label for="">Search In Item</label>
                      <input type="text" class="form-control" name="searchByItem_name" id="" aria-describedby="helpId" placeholder="Search In Item" wire:model.debound.500ms="searchByItem_name">
                    </div>
                  </div>
            </div>
        </div>

    </div>

    {{ $searchByItem_name}}

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Item ID</th>
          <th scope="col">Name</th>
          {{-- <th scope="col">Category</th> --}}
          <th scope="col">Store</th>
          {{-- <th scope="col">Initial Qty</th> --}}
          <th scope="col">Total Purchase</th>
          <th scope="col">Total Delivery</th>
          <th scope="col">Stock</th>
        </tr>
      </thead>
      <tbody>


          @forelse ($items as $item)


          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{ $item->name}}</td>
              {{-- <td>{{ $item->category->category}}</td> --}}
              <td>Uniform</td>
              {{-- <td>{{ $item->initialQty}}</td> --}}
              <td>{{ $item->totalReceived }}</td>
              <td>{{ $item->totalIssued }}</td>
          <td class="{{ $item->Balance > 0 ? '' : 'bg-danger' }}">{{ $item->Balance}}</td>
          </tr>
        @empty

        @endforelse
      </tbody>
    </table>

    <div>
    </div>
   <div class="pagination justify-content-center">
        {{ $items->links()}}
   </div>

  </div>
