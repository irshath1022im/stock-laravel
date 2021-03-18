
<div class="container">

    {{-- @dump($selectedStaff) --}}
    @component('components.notifications.notifications')

    @endcomponent

        <div>
  <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                NEW STAFF
            </button>

  <!-- Modal -->
                <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Save Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @livewire('create-user-livewire')
                        </div>
                    </div>
                    </div>
                </div>

        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    Do You want delete the staff ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancell</button>
                        <button type="button" class="btn btn-primary" wire:click="removeStaff({{ $selectedStaff}})">Yes</button>
                    </div>
                </div>

            </div>


        </div>
           <!-- End Modal -->





    <div>
        <table class="table table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Position</th>
                    <th>Contact Number</th>
                </tr>
                </thead>
                <tbody>

                    @forelse ($staffs as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->staff_name}}</td>
                        <td></td>
                        <td>IT</td>
                        <td>33869501</td>
                        <td>{{ $item->created_at}}</td>
                        <td><img src={{ asset('icons/edit_black_24dp.svg')}} wire:click="openModalRequest({{$item->id}}, 'update')" /></td>
                        <td><img src={{ asset('icons/trash-2.svg') }} wire:click="openModalRequest({{$item->id}}, 'delete')" /></td>
                    </tr>
                    @empty
                        <tr>
                            loading
                        </tr>
                    @endforelse

                </tbody>
        </table>
    </div>

        {{ $staffs->links()}}
</div>

