<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found by id'], 404);
        }

        return $book;
    }

    public function searchByTitle(Request $request)
    {
        $searchTerm = $request->input('title');

        if (!$searchTerm) {
            return response()->json(['error' => 'Search term not provided'], 400);
        }

        $books = Book::where('title', 'REGEXP', $searchTerm)->get();
        /*
        if ($books->isEmpty()) {
            return response()->json(['error' => 'No books found'], 404);
        }
        */
        return $books;
    }
}
