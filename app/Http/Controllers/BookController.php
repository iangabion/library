<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return $books;
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_title'=>'required',
            'author'=>'required',
            'count'=>'required',
            'status'=>'required',

        ]);

        $book = Book::create([
            'book_title'=> $request->book_title,
            'author'=> $request->author,
            'count'=> $request->count,
            'status'=>$request->status,


        ]);

        return $book;
    }
    
    public function show($id)
    {
        $book = Book::find($id);

        return $book;
    }

  
   
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_title'=>'required',
            'author'=>'required',
            'count'=>'required',
            'status'=>'required',

        ]);

 
        $book = Book::where('id', $id)
        ->update([
            'book_title'=> $request->book_title,
            'author'=> $request->author,
            'count'=> $request->count,
            'status'=>$request->status,

        ]);

        return "Success";
    }

    public function destroy(Book $book)
    {
        
        $book->delete();

        return $book;
    }
}