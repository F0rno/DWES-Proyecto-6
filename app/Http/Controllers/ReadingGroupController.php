<?php

namespace App\Http\Controllers;

use App\Models\ReadingGroup;
use Illuminate\Http\Request;

class ReadingGroupController extends Controller
{
    public function index()
    {
        $readingGroups = ReadingGroup::all();
        return response()->json($readingGroups);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}