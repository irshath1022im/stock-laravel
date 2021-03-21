<div>

    {{-- @component('components.notifications.notifications')

    @endcomponent --}}

    <form wire:submit.prevent="addNewUser">

        {{ $selectedStaff}}
        <div class="form-group">
            <label for="">First Name</label>
            <input type="text" name="first_name" id="" class="form-control" placeholder="First Name" wire:model.lazy='first_name' aria-describedby="helpId">
          </div>

          @error('first_name')
              <div class="alert alert-primary" role="alert">
                  <strong>{{$message}}</strong>
              </div>
          @enderror

          <div class="form-group">
           <label for="">Last Name</label>
           <input type="text" name="last_name" id="" class="form-control" placeholder="First Name" wire:model.lazy='last_name'>
         </div>

         @error('last_name')
         <div class="alert alert-primary" role="alert">
             <strong>{{$message}}</strong>
         </div>
        @enderror

         <div class="form-group">
           <label for="">Position</label>
           <input type="text" name="position" id="" class="form-control" placeholder="First Name" wire:model='position'>
         </div>

         @error('position')
         <div class="alert alert-primary" role="alert">
             <strong>{{$message}}</strong>
         </div>
        @enderror

         <div class="form-group">
           <label for="">contact no</label>
           <input type="number" name="contact_no" id="" class="form-control" placeholder="First Name" wire:model='contact_no'>
         </div>

         @error('contact_no')
         <div class="alert alert-primary" role="alert">
             <strong>{{$message}}</strong>
         </div>
        @enderror


         <div>
            <button type="submit" class="btn btn-primary btn-sm">NEW USER</button>
         </div>
      </form>
</div>
