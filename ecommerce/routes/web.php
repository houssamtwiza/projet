<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[StoreController::class,'index'])->name('home_page');
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/
// admin editor user
/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});
Route::middleware(['admin'])->group(function () {
   
    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);
    Route::get('/admin/dashboard', function () {
        return 'Hi Admin';
    })->name('admin_dashboard');

});
Route::middleware(['editor'])->group(function () {
    Route::get('/editor/dashboard', function () {
        return 'Hi Editor';
    })->name('editor_dashboard');

});


require __DIR__.'/auth.php';*/
Route::middleware(['editor'])->group(function(){
  
    Route::get('/editor/dashboard', [EditorController::class, 'index'])->name('editor_dashboard');
    
});
Route::middleware(['admin'])->group(function(){
    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);
    Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin_dashboard');
    
});

Auth::routes();

