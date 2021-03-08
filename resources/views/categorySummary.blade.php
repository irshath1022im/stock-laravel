@extends('layout')

@section('content')

{{-- {{ dump($category[0]->name)}} --}}

<div class="container">

        <div class="row">
            <div class="col-4">

                @component('components.categoryItemsQty', ['category'=> $category[0]])

                @endcomponent

            </div>

            {{-- <div class="col-8">

                <ul class="nav nav-tabs">
                    <li class=" p-2 text-uppercase border border-outline-secondary">
                        <a data-toggle="tab" href="#received">Received</a>
                    </li>
                    <li class="p-2 text-uppercase border border-outline-secondary">
                        <a data-toggle="tab" href="#issued">Issued</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="received" class="tab-pane fade in active">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>

                    <div id="issued" class="tab-pane fade">
                        <table class="  table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Staff Name</th>
                                <th scope="col">Item</th>
                                <th scope="col">ItemCategory</th>
                                <th scope="col">Qty</th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($category[0]->category as $item)
                                    @foreach ($item->issued_item as $issued_item)
                                    <tr>
                                        <td>{{ $issued_item->issued_date}}</td>
                                        <td>{{ $issued_item->staff->staff_name}}</td>
                                        <td>{{ $item->name}}</td>
                                        <td>{{ $category[0]->category}}</td>
                                        <td>{{ $issued_item->qty}}</td>
                                    </tr>
                                    @endforeach

                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>



                </div> --}}

            </div>

        </div>

</div>
@endsection
