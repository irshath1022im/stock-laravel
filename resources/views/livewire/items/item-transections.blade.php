<div>

    <div wire:loading>
        @component('components.spinner')
            
        @endcomponent
    </div>

 
    <div>
        <table class="table" wire:loading.remove>
            <thead>
                <tr>
                    <th>#</th>
                    <th>TYpe</th>
                    <th>Transection</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($logs as $item)
                    
               
                    <tr class=" @if($item->transection->effect == 'Out')
                      bg-danger
                    @else
                        bg-light
                    @endif
                    ">
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->transection->transection }}</td>
                        <td>{{ $item->transection->effect }}</td>
                        <td>{{ $item->qty }}</td>
                    </tr>

                @endforeach
              
                
            </tbody>
        </table>

        {{ $logs->links() }}
    </div>

 

        
</div>
