<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" >
    @csrf

    
    <div class="mb-3">
        <label for="name" class="form-label"  >Name</label>
        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            value="{{old('name')}}"
          
           
        />
       
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Description</label>
        <textarea  class="form-control" name="description" id="description" >  {{old('description')}}</textarea>
       
       
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Quantity</label>
        <input
            type="text"
            name="quantity"
            id="quantity"
            class="form-control"
            value="{{old('quantity')}}"
           
        />
       
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input
            type="file"
            name="image"
            id="image"
            class="form-control"
           
           
        />
       
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Price</label>
        <input
            type="number"
            step="0.5"
            name="price"
            id="price"
            class="form-control"
            value="{{old('price')}}"
           
        />
       
    </div>
    <div class="mb-3">
        
        <input
            type="submit"
           
        
            class="btn btn-primary w-100"
            value="Add"
           
        />
       
    </div>
</form>
