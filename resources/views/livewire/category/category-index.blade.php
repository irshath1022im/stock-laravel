<div>

    @component('components.alerts')
        
    @endcomponent


    <div class="card-header">
        CATEGORY 

        @auth
            
        <button type="button" class="btn btn-sm btn-outline-primary" 
        data-bs-toggle="modal" data-bs-target="#modelId"
        
        >New</button>
    
        @endauth
    </div>



        <div class="card-group">

                    <div class="row">

                        @foreach ($categories as $item)
                            
                            <div class="col-md-6 col-lg-3 m-2">
                            
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                    <span>
                                                        <a href="{{ route('category.show',['category' => $item->id]) }}">
                                                        {{ $item->category }}</a>
                                                    </span>
                                                 
                                            </div>
                                        </div>

                                        

                                        <div class="card-body">
                                            <img class="card-img-top img-fluid p-2" src="{{ Storage::URL($item->coverPicture) }}" alt="">

                                         

                                        </div>

                                    </div>

                            </div>   
                
                        @endforeach

                        {{ $categories->links() }}
                    </div>
            </div>

       

            

 

    

    {{-- end of card --}}
   

   
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('category.category-create-form',['category_id' => 0])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="$emit('closeBtnClicked')"
                    >Close</button>
                </div>
            </div>
        </div>
    </div>
    



</div>
