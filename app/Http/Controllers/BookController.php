<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){

        try {

            $books = Book::all();

            return response()->json($books, 200);

        }catch (\Exception $e){

            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(Request $req){

        try{

            $book = Book::create($req->all());

            return response()->json(
                [
                    'message' => 'Livro cadastrado com sucesso',
                    'book' => $book
                ],200);

        }catch (\Exception $e){

            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id){

        try {

            $data = $req->all();

            $book = Book::findOrFail($id);
            if(isset($data['title'])) $book->title = $data['title'];
            if(isset($data['description'])) $book->title = $data['description'];
            if(isset($data['price'])) $book->title = $data['price'];

            $book->save();

            return response()->json($book, 200);
        }catch (\Exception $e){

            return response()->json($e->getMessage(), 500);
        }
    }

    public function delete($id){

        try {

            $book = Book::findOrFail($id);
            $book->delete();

            return response()->json($book, 200);
        }catch (\Exception $e){

            return response()->json($e->getMessage(), 500);
        }
    }
}
