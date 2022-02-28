<div>

    @empty($category)
       
        @component('components.notifications.empty')
            
        @endcomponent

        @else
   

    <div class="row">

        <div class="col col-md-6">
    
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title ">{{ $category->category }}</div>
                </div>
                <div class="card-body">

                  
                    </div>

                    <img class="card-img-top img-fluid w-50 p-2 border" src="{{ Storage::URL($category->coverPicture) }}" alt="{{ $category->category }}">
                       
                        @auth
                                                        
                            @livewire('shared.picture-upload-input', ['request_id' => $category->id])
    
                        @endauth
    
                </div>
            </div>
        </div>
    
    
    

    
    
    
    </div>

    @endempty






</div>
