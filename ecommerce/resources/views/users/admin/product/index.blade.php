@extends('users.admin.app')
@section('title','Products')
    

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Product List </h1>
    <a href="{{route('products.create')}}" class="btn btn-primary">create</a>
</div>
    
   
 
    <table
        class="table"
    >
        <thead>
            <tr>
                <th >Id</th>
                <th >Name</th>
                <th>Description</th>
                <th>Category</th>
                <th >quantity</th>
                <th>image</th>
                <th>price</th>
                <th>actions </th>


            </tr>
        </thead>
        <tbody>
       @foreach ($products as $product)
       <tr>
        <td>{{$product->id}}</td>
        <td > {{$product->name}} </td>
        <td  >{!! $product->description !!}</td>
        <td align="center"  >
         @if ($product->category)
         
         <a href="{{route('categories.show',$product->category_id)}}" class="btn btn-link">
         <span class="badge bg-primary">
            {{$product->category->name}}
            </span>
        </a>
           @endif 
        
           
        </td>
        <td >{{$product->quantity}}</td>
        <td> <img width="100px" src="storage/{{$product->image}}" >    </td>
        <td>{{$product->price}}</td>
        <td><div class="btn-group gap-2">
            <a href="{{route('products.edit',$product)}}" class="btn btn-primary mx-2">Update</a>
            
            <form  method="post" action="{{route('products.destroy',$product)}}">
            @csrf
            @method('delete')
                <input value="delete" type="submit" class="btn btn-danger"/>
            </form>
        </div>
        
                        </th></td>
       </tr>
      
       @endforeach
        </tbody>
    </table>
    {{$products->links()}}

 
     

@endsection