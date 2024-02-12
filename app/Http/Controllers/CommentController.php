<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentCollection;

class CommentController extends Controller
{
    public function store(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:16',
            'msg' => 'required',
            'books_book_id' => 'required|exists:books,book_id',
        ]);
    
        $comment = Comment::create([
            'username' => $validatedData['username'],
            'msg' => $validatedData['msg'],
            'books_book_id' => $validatedData['books_book_id'],
        ]);
    
        return response()->json(['comment' => $comment, 'message' => 'Comment created successfully'], 201);
    }

    public function search(Request $request)
    {
        $book_id = $request->input('book_id');
        $query = Comment::query();
        
        if (!$book_id) {
            return response()->json(['error' => 'Book id must be provided'], 400);
        }
            
        $query->where('books_book_id', 'REGEXP', $book_id);
        $comments = $query->paginate();
     
        return new CommentCollection($comments);
    }
}