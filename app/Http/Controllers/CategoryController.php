<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($id){
        $cate = DB::table('categories')
        ->where('id', $id)
        ->first();
        $books = DB::table('books')
        ->where('Category_id', $id)
        ->paginate(9);
        return view('shop', compact('cate', 'books'));
    }
    public function index(){
        $books = DB::table('books')
        ->paginate(9);
        
        return view('shop' , compact('books'));
    }
}
