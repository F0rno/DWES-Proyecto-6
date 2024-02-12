<?php

namespace App\Http\Controllers;

use App\Models\ReadingGroup;
use Illuminate\Http\Request;
use App\Models\User;

class ReadingGroupController extends Controller
{
    public function index()
    {
        $readingGroups = ReadingGroup::all();
        return response()->json($readingGroups);
    }
}