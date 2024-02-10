


@extends('users.admin.app')
@section('title',($isUpdate?'Update':'Create').' Category')
    
@php
    $route=route('categories.store');
    if($isUpdate){
        $route=route('categories.update',$category);
    }
@endphp





@section('content')
    <h1>@yield('title')</h1>
 
    <form action="{{$route}}" method="post"  >
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
                value="{{old('name',$category->name)}}"
              
               
            />
           
        </div>
       
      
        
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

