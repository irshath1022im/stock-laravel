@extends('layouts.adminLayout')

@section('content')
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">PROMOTIONAL ITEMS</h4>

        </div>
        <div class="card-body">
            <form>

                <div class="row">

               
                <div class="col mb-3">
                  <label for="" class="form-label">Name</label>
                  <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <div class=" col mb-3">
                  <label for="" class="form-label">Category</label>
                  <select class="form-control" name="" id="">
                    <option>Select</option>
                    <option>Category2</option>
                    <option>Category1</option>
                  </select>
                </div>
            </div>
                <section>
                    <div class="card bg-purple100">
                        <div class="card-header">OPTIONS</div>
                        <div class="card-body">
                    
                        </div>
                    </div>
                </section>


            </form>
        </div>
    </div>
@endsection