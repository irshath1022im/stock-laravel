   {{-- @dump($category) --}}
   <div class="card" style="width: 250px;padding: 5px;margin: 2px;">
        <div class="card-body">
            <h4 class="card-subtitle mb-2 text-uppercase" 
                style="text-align: center;color: rgb(238,242,244);background: #0d3a54;padding: 6px;">
               {{$category['category']}}</h4>

            <div style="height: 300px;width: 100%;">
                <img data-bss-hover-animate="swing" 
                src="{{ Storage::url($category['coverPicture'])}} " 
                style="width: 100%;height: 100%;border-radius: 24px;">
            </div>

            <ul class="list-group" style="margin-top: 8px;">
                @forelse ($category['items'] as $item)
                    
                    <li class="list-group-item" style="text-align: center;">
                        <span class="text-uppercase" 
                        style="border-color: rgb(84,1,1);color: rgb(135,73,0);font-size: 13px;font-family: Antic, sans-serif;font-weight: bold;text-align: left;">
                            {{ $item['name']}}
                        </span>

                        <span class="badge badge-primary" style="margin-left: 15px;">{{ $item['balance']}}</span>
                    </li>
                @empty
                <div class="alert alert-primary" role="alert">
                    <strong>No Items Found ...</strong>
                </div>
                    
                @endforelse 
                    
                
            </ul>
        </div>
    </div>