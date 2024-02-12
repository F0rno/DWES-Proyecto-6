<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersHasReadingGroups extends Model
{
    use HasFactory;

    protected $table = 'users_has_reading_groups';

    public $timestamps = false;

    protected $fillable = [
        'users_user_id',
        'reading_groups_reading_group_id',
    ];

    // If your pivot table has a primary key, uncomment the following line and replace 'id' with your primary key
    // protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_user_id', 'user_id');
    }

    public function readingGroup()
    {
        return $this->belongsTo(ReadingGroup::class, 'reading_groups_reading_group_id', 'reading_group_id');
    }
}