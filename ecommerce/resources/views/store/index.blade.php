@extends('layouts.app')
@section('title','Products')
    @section('sidebar')
        <h1>Filters</h1>
        <form method="get">

<div class="mb-3">
  <label for="name" >Name</label>
  <input
    type="text"
    name="name"
    id="name"
    value="{{\Illuminate\Support\Facades\Request::input('name')}}"
    class="form-control"
    placeholder="Name"
 
  />
  
</div>
<div class="mb-3">
 <h3>Categories</h3>
 @php
     $categoriesIds=Request::input('categories')??[];
 @endphp
@foreach ($categories as $category)
<div class="form-check">
  <input @checked(in_array($category->id,$categoriesIds)) type="checkbox"  name="categories[]" value="{{$category->id}}" class="form-checkbox"> 
  <label class="form-check-label" >{{$category->name}}</label>
</div>
 
   @endforeach
   <h3>Pricing</h3>
  <div class="mb-3">
    <label for="min" class="form-label">Min</label>
    <input
    min="{{$priceOptions->minPrice}}"
    
      type="number"
      name="min"
      id="min"
      class="form-control"
      placeholder="Min price"
      value="{{Request::input('min')}}"
   
    />
    <label for="max" class="form-label">Max</label>
    <input
    max={{$priceOptions->maxPrice}}
      type="number"
      name="max"
      id="max"
     
      class="form-control"
      placeholder="Max price"
      value="{{Request::input('max')}}"
   
    />
    
  </div>
  
</div>
<div class="mb-3">
  
  <input
    type="submit"
    
    class="btn btn-primary "
    value="Filter"
 
  />

  <a type="reset" href="{{route('home_page')}} " class="btn btn-secondary">Reset</a>
</div>



        </form>
    @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Last Products  </h1>
 
</div>


<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($products as $product)

  <div class="col">
    <div class="card h-100">
       
        
     
        <img class="card-img-top h-100" src="storage/{{$product->image}}" alt="Title" />
        <div class="card-body">
            <h4 class="card-title"> {{$product->name}}</h4>
            <p class="card-text">{!! $product->description !!}</p>
            <hr>
            <div class="d-flex justify-content-between">
                <span> Quantite :  <span class="badge bg-success">{{$product->quantity}}</span></span>
               <span> Prix: <span class="badge bg-primary">{{$product->price}} MAD</span></span> 
            </div>
          <hr>
          <div class="my-2">

            Category: <span class="badge bg-primary">{{$product->category?->name}}</span>
          </div>
          
            <div class="card-footer">
            <small class="text-muted">
              {{$product->created_at}}  
            </small>
           </div>
        </div>
    </div>
  </div>
   





@endforeach
  
   
</div>
    
    
   

 
     

@endsection