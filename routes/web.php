<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    $books = DB::table('books')
    ->limit(8)
    ->orderByDesc('price')
   ->get();

   $thap = DB::table('books')
   ->limit(8)
   ->orderBy('price')
  ->get();
  $cate = DB::table('categories')->get();
    return view('home', compact('books', 'thap' , 'cate'));

})->name('index');
Route::get('/search', [BookController::class, 'search'])->name('search');
Route::resource('category', CategoryController::class);
Route::resource('book', BookController::class);
Route::get('dashboard', function(){
    return view('admin.home');
});

Route::get('/sigin',[ UserController::class, 'login'])->name('user.sigin');
Route::post('/sigin',[ UserController::class, 'sigin']);
Route::get('/sigup',[ UserController::class, 'sigup'])->name('user.sigup');
Route::post('/sigup',[ UserController::class, 'register']);

Route::get('/cart', function(){
    return view('cart.view');
});
