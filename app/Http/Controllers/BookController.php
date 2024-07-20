<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class BookController extends Controller
{
    public function index(){
        $books = BookModel::orderByDesc('id')->paginate(5);
        return view('admin.Books.List', compact('books'));
    }
    public function create(){
        $categories = DB::table('categories')->get();
      return view('admin.Books.Create',compact('categories'));
    }
    public function store(Request $request){
            $data = [
                'title'=> $request['title'],
                'thumbnail'=> $request['thumbnail'],
                'author'=> $request['author'],
                'publisher'=> $request['publisher'],
                'publication'=> $request['publication'],
                'price'=> $request['price'],
                'quantity'=> $request['quantity'],
                'category_id'=> $request['category_id']
            ];
            DB::table('books')->insert($data);
            return redirect()->route('book.index');
    }
    public function destroy($id){
        DB::table('books')->delete($id);
        return redirect()->route('book.index');
    }
    public function edit($id){
       $book =  DB::table('books')->where('id', $id)->first();
       $categories = DB::table('categories')->get();
       return view('admin.Books.Edit', compact('book', 'categories'));
    }
    public function update(Request $request){
        $data = [
            'title'=> $request['title'],
            'thumbnail'=> $request['thumbnail'],
            'author'=> $request['author'],
            'publisher'=> $request['publisher'],
            'publication'=> $request['publication'],
            'price'=> $request['price'],
            'quantity'=> $request['quantity'],
            'category_id'=> $request['category_id']
        ];
        DB::table('books')
        ->where('id', $request['id'])
        ->update($data);
        return redirect()->route('book.index');
    }
    public function show($id){
        $book = DB::table('books')
           ->where('id', $id)
           ->first();
            return view('detailBook', compact('book'));
    }
    public function search(Request $request)
    {
        $books = BookModel::query()->where('title', 'LIKE', '%'. $request->input('search').'%')
            ->paginate(9);

        return view('shop', compact('books'));
    }
}
