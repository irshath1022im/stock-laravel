 <div>
    <hr/>


        <div class="row border container">
            <form wire:submit.prevent="addStoreRequest">
                <div class="row">
                        <div class="col form-group">
                            <label for="">Item</label>
                            <select class="form-control" name="item_id" id="" wire:model="item_id">
                            <option value=0>Select</option>
                            @foreach ($items as $item)
                            <option value="{{ $item->id}}"
                                >{{ $item->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col form-group">
                            <label for="">Qty</label>
                            <input type="number" wire:model="qty"
                            class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="QTY"
                            value="{{old('qty', $qty) }}">


                        </div>

                        <div class="form-group">
                            <label for="">Remark</label>
                            <input type="text" name="remark" id="" class="form-control" placeholder="remark" wire:model='remark'>
                        </div>



                        <div class="d-flex align-items-center justify-content-space">
                            <button type="" class="btn btn-sm btn-primary">
                                {{ $updateBtnStatus === true ? 'UPDATE' : 'SAVE' }}
                            </button>

                            <button type="button" class="btn btn-sm bg-danger" wire:click="changeBtnStatus">Clear</button>
                        </div>
                </div>
                    @if ($errors)
                        <div class="row">
                                <div class="alert alert-primary" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </div>
                        </div>
                    @endif
            </form>
        </div>
</div>
