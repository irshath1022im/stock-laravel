<div>
    
    {{-- @dump($items) --}}
    <div class="spinner-border text-primary" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
    </div>

    <div class="card" wire:loading.remove>
        <div class="card-body">
            <div class="card-header">
                <div class="card-title"><h5>ITEM NAME: {{ $itemId }}</h5></div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SIZE</th>
                        <th>QTY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>XXL</td>
                        <td>15</td>
                    </tr>
                
                </tbody>
            </table>
       
        </div>
    </div>

</div>
