@extends('base')
@section('title','Products')
    

@section('content')
    <h1>Product List</h1>
 <div
    class="table-responsive"
 >
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">quantity</th>
                <th>image</th>
                <th>price</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
       @foreach ($products as $product)
       <th scope="col"> {{$prodcuct->name}} </th>
       <th scope="col">{{$prodcuct->description}}</th>
       <th scope="col">{{$prodcuct->quantity}}</th>
       <th>{{$prodcuct->image}}</th>
       <th>{{$prodcuct->price}}</th>
       <th>actions</th>
       @endforeach
        </tbody>
    </table>
 </div>
 
        
    </table>

@endsection