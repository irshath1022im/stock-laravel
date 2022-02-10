
<div>

    {{-- @dump($selectedStore) --}}
    {{-- @dump($selectedCategory) --}}
    {{-- @component('components.adminLayout')

    @endcomponent --}}




    <section style="width: 90%;margin: 0 auto;margin-left: auto;margin-top: 20px;">
        <div class="row">


            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3" style="border: 3px none rgb(159,0,0) ;">

               @livewire('stores.store-list')


                <hr style="color: rgb(119,6,6);width: 260.375px;border-width: 2px;border-style: solid;">

                <ul class="list-group">
                    @foreach ($categories as $item)

                    <li class="list-group-item" data-bss-hover-animate="pulse">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="formCheck-2"
                                name="selectedCategory"
                                wire:model="selectedCategory"
                                value="{{ $item->category}}">
                            <label class="form-check-label text-uppercase" for="formCheck-1" style="color: rgb(71,66,66);font-family: Antic, sans-serif;font-weight: bold;">
                                {{ $item->category}}</label></div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-12 col-md-7 col-lg-7 col-xl-9 d-flex justify-content-around flex-wrap" style="border-style: none;border-color: rgb(130,120,120);">

                @forelse ($categorySummary as $item)
                    @component('components.categoryCard', ['category' => $item])

                    @endcomponent
                @empty

                <div class="alert alert-primary" role="alert">
                    <strong>No Items Found ...</strong>
                </div>

                @endforelse
            </div>


        </div>
    </section>



</div>
