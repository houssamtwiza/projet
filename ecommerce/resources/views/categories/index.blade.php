@extends('users.admin.app')
@section('title','categories')
    

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>categories</h1>
    <a href="{{route('categories.create')}}" class="btn btn-primary">create</a>
</div>
    
   
 
    <table
        class="table"
    >
        <thead>
            <tr>
                <th >Id</th>
                <th >Name</th>
      
                <th>actions </th>


            </tr>
        </thead>
        <tbody>
       @foreach ($categories as $categorie)
       <tr>
        <td  >{{$categorie->id}}</td>
        <td > {{$categorie->name}} </td>
      
       
        <td><div class="btn-group gap-2">
            <a href="{{route('categories.show',$categorie)}}" class="btn btn-info mx-2">Show</a>
            <a href="{{route('categories.edit',$categorie)}}" class="btn btn-primary mx-2">Update</a>
            <form  method="post" action="{{route('categories.destroy',$categorie)}}">
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
  

 
     

@endsection