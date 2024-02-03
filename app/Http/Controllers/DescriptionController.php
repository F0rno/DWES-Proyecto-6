<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Description;

class DescriptionController extends Controller
{
    public function index()
    {
        return Description::all();
    }

    public function show($id)
    {
        $description = Description::find($id);

        if (!$description) {
            return response()->json(['error' => 'Description not found'], 404);
        }

        return $description;
    }
}
