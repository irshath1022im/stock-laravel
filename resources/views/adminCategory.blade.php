

@extends('layouts.adminLayout')

@section('content')

    @if($message = session('message'))
      <div class="alert alert-primary" role="alert">
            <strong>{{ $message}}</strong>
        </div>
    @endif


        {{-- @livewire('admin.store') --}}
        <div>

            <div>

                <div class="input-group mb-3">
                    <a name="" id="" class="btn btn-primary" href="{{ route('category.create') }}"role="button">NEW CATEGORY</a>
                  </div>


            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>CATEGORY ID</th>
                        <th>CATEGORY</th>
                        <th>PICTURE</th>
                        <th>EDIT</th>
                        <th>REMOVE</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($categories as $category)
                    <tr>
                        <td scope="row">{{ $category->id}}</td>
                        <td class="text-uppercase">{{ $category->category}}</td>
                        <td class="text-uppercase">
                            <img src="{{ Storage::url($category->coverPicture) }}" class="img-fluid w-25" /></td>
                        <td>
                            <form method="get" action="{{ route('category.edit', ['category'=>$category->id])}}">
                                @csrf
                            <a href="{{ route('category.edit',['category'=> $category->id]) }}">
                                <img src=" {{ asset('icons/edit_black_24dp.svg')}}" /></a>

                            </form>
                        </td>

                        <td>
                            <form action="{{ route('category.destroy', ['category'=>$category->id])}}">
                                @csrf
                                @method("DELETE")

                            <a  href="{{ route('category.destroy',['category'=> $category->id]) }}">
                                <img src=" {{ asset('icons/trash-2.svg')}}" /></a>

                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td>Loading...</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>


        </div>



  <!-- Modal -->


</div>
@endsection
