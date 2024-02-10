@extends('users.admin.app')
@section('title','categories')
    

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>category: {{$category->name}} </h1>
    <a href="{{route('categories.index')}}" class="btn btn-primary">Go back</a>
</div>
    
   
 
    <table
        class="table"
    >
        <thead>
            <tr>
                <th >Id</th>
                <th >Name</th>
      
                <th>Update products </th>


            </tr>
        </thead>
        <tbody>
       @forelse ($products as $product)
       <tr>
        <td  >{{$product->id}}</td>
        <td > {{$product->name}} </td>
      
       
        <td><div class="btn-group gap-2">
          
            <a href="{{route('products.edit',$product)}}" class="btn btn-primary mx-2">Update</a>
          
        </div>
        
                        </th></td>
       </tr>
      @empty
          <tr>
            <td colspan="6" align="center"><h6>No products for this categorie</h6></td>
          </tr>
     
       @endforelse
        </tbody>
    </table>
  

    

 
     

@endsection