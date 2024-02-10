<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request;

class EditorController extends Controller
{
   
/** 
    *   @return \Illuminate\Contracts\Support\Renderable
    
    */ 
   
    
   public function index()
   {
       return view('users.editor.dashboard');
   }
}
