<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   /** 
    *   @return \Illuminate\Contracts\Support\Renderable
    
    */ 
   
  
   public function index()
   {
       return view('users.admin.dashboard');
   }
}