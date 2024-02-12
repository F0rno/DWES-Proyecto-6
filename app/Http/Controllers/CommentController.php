<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentCollection;

class CommentController extends Controller
{
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