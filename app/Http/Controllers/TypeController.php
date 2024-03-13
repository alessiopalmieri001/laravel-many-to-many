<?php

namespace App\Http\Controllers;

//Models
use App\Models\Type;
use App\Models\Project;

use Illuminate\Http\Request;

// Helper
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view("types.index", compact("types"));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $type = Type::where('slug' , $slug)->firstOrFail();
        $projects = Project::where('type_id', $type->id)->get();

        return view('types.show', compact('type', 'projects'));
    }
}
