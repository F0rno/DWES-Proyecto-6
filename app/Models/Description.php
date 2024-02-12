<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    
    protected $keyType = 'string';
    protected $primaryKey = 'description_id';

    public function books()
    {
        return $this->hasMany(Book::class, 'description_description_id', 'description_id');
    }
}
