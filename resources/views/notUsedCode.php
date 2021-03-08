<form method="GET" action="{{ route('items', ['orderBy' => 'stock'])}}">
    {{-- @csrf --}}
 <div class="form-group">
     <label for="">Order By</label>
     <select class="custom-select" name="" id="">
         <option selected>Item</option>
         <option value="stock">Stock</option>
         <option value="category">Category</option>
         <option value="store">Store</option>
     </select>

     <button type="submit" class="btn btn-primary btn-sm">Submit</button>
 </div>
</form>
