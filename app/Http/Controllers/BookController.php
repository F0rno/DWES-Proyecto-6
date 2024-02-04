<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
    public function index()
    {
        return new BookCollection(Book::paginate());
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found by id'], 404);
        }

        return new BookResource($book);
    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        $type = $request->input('type');
        $sort = $request->input('sort');

        $query = Book::query();

        if (!$title && !$type && !$sort) {
            return response()->json(['error' => 'At least one parameter must be provided'], 400);
        }

        if ($title) {
            $query->where('title', 'REGEXP', $title);
        }

        if ($type) {
            $query->where('type', 'REGEXP', $type);
        }

        if ($sort) {
            $query->where('sort', 'REGEXP', $sort);
        }

        $books = $query->paginate();
     
        return new BookCollection($books);
    }
}
