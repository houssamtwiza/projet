


@extends('users.admin.app')
@section('title',($isUpdate?'Update':'Create').' Product')
    
@php
    $route=route('products.store');
    if($isUpdate){
        $route=route('products.update',$product);
    }
@endphp





@section('content')
    <h1>@yield('title')</h1>
 
    <form action="{{$route}}" method="post" enctype="multipart/form-data" >
        @csrf
    @if ($isUpdate){
        @method('put')
    }
        
    @endif
        
        <div class="mb-3">
            <label for="name" class="form-label"  >Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{old('name',$product->name)}}"
              
               
            />
           
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Description</label>
            <textarea  class="form-control" name="description" id="description" >  {{old('description',$product->description)}}</textarea>
           
           
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Quantity</label>
            <input
                type="text"
                name="quantity"
                id="quantity"
                class="form-control"
                value="{{old('quantity',$product->quantity)}}"
               
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
                value="{{old('price',$product->price)}}"
               
            />
            <div class="mb-3">
                <label for="category_id" class="form-label">Categorie</label>
                <select
                    type="number"
                   
                    name="category_id"
                    id="category_id"
                    class="form-select"
                    value="{{old('price',$product->price)}}"
                   
                >
                <option value="">choisir votre categorie</option>
               
            @foreach ($categories as $categorie)
            <option @selected(old('category_id',$product->category_id)===$categorie->id) value="{{$categorie->id}}"> {{$categorie->name}} </option>
 @endforeach
            </select>
           
        </div>
        <div class="mb-3">
            
            <input
                type="submit"
               
            
                class="btn btn-primary w-100"
                value="{{$isUpdate?'Edit':'Create'}}"
               
            />
           
        </div>
    </form>
    
@endsection

