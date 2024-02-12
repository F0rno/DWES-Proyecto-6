<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'username',
        'msg',
        'books_book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'books_book_id', 'book_id');
    }
}
