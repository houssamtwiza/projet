<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {$productQuery=Product::query()->with('category');
      //  $max=Product::query()->max('price');
       // $min=Product::query()->min('price');
        $categories= Category::with('products')->has('products')->get();
        $name=($request->input('name'));
        
        $max=($request->input('max'));
        $min=($request->input('min'))??0;
       
        $categorieIds=($request->input('categories'));
        if(!empty($name)){
            $productQuery->where('name','like',"%{$name}%");
        }
        
            $productQuery->where('price','>=',$min);
        
        if(!empty($max)){
            $productQuery->where('price','<=',$max);
        }
        if(!empty($categorieIds)){
            $productQuery->whereIn('category_id',$categorieIds); 
        }
      
      $products=$productQuery->get();
    /*  $prices=$products->pluck('price')->all();  
      $priceOptions=new \stdClass();

      $priceOptions->minPrice=0;
      $priceOptions->maxPrice=0;
       if(!empty($prices)){
        $priceOptions->minPrice=min($prices);
        $priceOptions->maxPrice=max($prices);
       }*/

     
       
          return view('store.index',compact('products','categories','priceOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {$product=new Product();
        //donner des valeur par defaut
        $product->fill([
            'quantity'=>0 ,
            'price'=>0       ]);
        $isUpdate=false;
        return view('product.form',compact('product','isUpdate'));
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
        return view('product.form',compact('product','isUpdate'));
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
