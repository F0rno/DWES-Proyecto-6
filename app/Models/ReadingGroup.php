<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadingGroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'reading_group_id';
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_reading_groups', 'reading_groups_reading_group_id', 'users_user_id');
    }
}
