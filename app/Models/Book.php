<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'book_id';

    public function description()
    {
        return $this->belongsTo(Description::class, 'description_description_id', 'description_id');
    }
}
