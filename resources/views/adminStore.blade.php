

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
                    <a name="" id="" class="btn btn-primary" href="{{ route('store.create') }}"role="button">NEW STORE</a>
                  </div>


            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>STORE ID</th>
                        <th>Logo</th>
                        <th>STORE</th>
                        <th>EDIT</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($stores as $store)
                    <tr>
                        <td scope="row">{{ $store->id}}</td>
                        <td scope="row">
                            <img class="w-25 img-fluid"
                            src="{{ Storage::url($store->coverPicture) }}" />
                        </td>
                        <td class="text-uppercase">{{ $store->name}}</td>
                        <td>
                            <form method="post" action="{{ route('store.edit', ['store'=>$store->id])}}">
                                @csrf
                                @method("PUT")
                            <a href="{{ route('store.edit',['store'=> $store->id]) }}">
                                <button class="btn btn-sm btn-outline-info">Edit</button>
                            </a>

                            </form>
                        </td>

                        <td>
                            <form action="{{ route('store.destroy', ['store'=>$store->id])}}">
                                @csrf
                                @method("DELETE")
                            <a href="{{ route('store.destroy',['store'=> $store->id]) }}">
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </a>

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
