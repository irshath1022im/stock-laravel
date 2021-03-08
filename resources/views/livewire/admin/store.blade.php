<div>

    <div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="New Store" aria-describedby="basic-addon2" wire:model="newStore" required>

            <div class="input-group-append">
            <button {{ !$newStore ? 'disabled' : null }} type="submit" class="input-group-text" id="basic-addon2" wire:click="saveStore">ADD</button>
            </div>
          </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>STORE ID</th>
                <th>STORE</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($stores as $store)
            <tr>
                <td scope="row">1</td>
                <td>{{ $store}}</td>
                <td><i class="fa fa-address-card" aria-hidden="true">card</i></td>
            </tr>
            @empty
                <tr>
                    <td>Loading...</td>
                </tr>
            @endforelse


        </tbody>
    </table>


</div>

