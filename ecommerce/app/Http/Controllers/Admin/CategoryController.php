<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::query()->get();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=new Category();
        //donner des valeur par defaut
       
        $isUpdate=false;
        return view('categories.form',compact('category','isUpdate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieRequest $request)
    {
        $formFields=$request->validated();
       
        
       
        
       Category::create($formFields);
       return to_route('categories.index')->with('success','votre categorie est bien cree');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
      $products=$category->products()->get();
      return view('categories.show',compact('category','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $isUpdate=true;
        return view('categories.form',compact('category','isUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieRequest $request, Category $category)
    {
        $formFields=$request->validated();
        $category->fill($formFields)->save();
        return to_route('categories.index')->with('sucess','votre categorie est bien modifie');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index')->with('sucess','votre categorie est bien suprime');    
    }
    
}
