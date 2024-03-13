<?php

namespace App\Http\Controllers\Admin;

//Models
use App\Models\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use Illuminate\Support\Str;

// Form Request
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $validatedTypeData = $request->validated();


        $validatedTypeData['slug'] = Str::slug($validatedTypeData['name']);

        $type = Type::create($validatedTypeData);

        return redirect()->route('admin.types.show', ['type' => $type->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();

        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {

        $type = Type::where('slug', $slug)->firstOrFail();

        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, string $slug)
    {
        $validatedTypeData = $request->validated();

        $type = Type::where('slug', $slug)->firstOrFail();

        $validatedTypeData['slug'] = Str::slug($validatedTypeData['name']);

        $type->update($validatedTypeData);

        return redirect()->route('admin.types.show',['type'=>$type->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {   
        $type = Type::where('slug', $slug)->firstOrFail();
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
