<div>

    {{-- @dump($items) --}}
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Item ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Initial Qty</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>
            </tr>
        </thead>
          <tbody>

         @forelse ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->category_id}}</td>
                <td>{{$item->initialQty}}</td>
                <td>
                    <form method="get" action="{{ route('items.edit', ['item'=>$item->id])}}">
                        @csrf
                    <a href="{{ route('items.edit',['item'=> $item->id]) }}">
                        <img src=" {{ asset('icons/edit_black_24dp.svg')}}" /></a>

                    </form>
                </td>


                <td>
                    <form action="{{ route('items.destroy', ['item'=>$item->id])}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">Delete</button>
                        {{-- <img type="submit" src=" {{ asset('icons/trash-2.svg')}}" /> --}}
                    </form>

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

</div>
