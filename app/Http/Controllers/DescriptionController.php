<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Description;
use App\Http\Resources\DescriptionResource;
use App\Http\Resources\DescriptionCollection;


class DescriptionController extends Controller
{
    public function index()
    {
        return new DescriptionCollection(Description::paginate());
    }

    public function show($id)
    {
        $description = Description::find($id);

        if (!$description) {
            return response()->json(['error' => 'Description not found'], 404);
        }

        return new DescriptionResource($description);
    }
}
