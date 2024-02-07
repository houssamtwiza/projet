@extends('base')
@section('title','create Product')
    

@section('content')
    <h1>@yield('title')</h1>
 
@include('product.form')
@endsection