<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products=Product::query()->paginate(2);
       return view('users.admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {$product=new Product();
        $categories=Category::all();
        //donner des valeur par defaut
        $product->fill([
            'quantity'=>0 ,
            'price'=>0       ]);
        $isUpdate=false;
        return view('users.admin.product.form',compact('product','isUpdate','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFields=$request->validated();
     if($request->hasFile('image')){
        $formFields['image']=$request->file('image')->store('product','public');
     }
     
    
     
    Product::create($formFields);
    return to_route('products.index')->with('success','votre produit est bien cree');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
      
        $isUpdate=true;
        $categories=Category::all();
        return view('users.admin.product.form',compact('product','isUpdate','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    { 

        $formFields=$request->validated();
        $product->fill($formFields)->save();
        return to_route('products.index')->with('sucess','votre produit est bien modifie');  
      // dd($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    //route model binding
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('sucess','votre produit est bien suprime');    
    }
}
