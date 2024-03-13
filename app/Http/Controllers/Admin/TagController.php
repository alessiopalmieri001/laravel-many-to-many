<?php

namespace App\Http\Controllers\Admin;

//Models
use App\Models\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use Illuminate\Support\Str;

// Form Request
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view("admin.tags.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $validatedTagData = $request->validated();


        $validatedTagData['slug'] = Str::slug($validatedTagData['name']);

        $tag = Tag::create($validatedTagData);

        return redirect()->route('admin.tags.show', ['tag' => $tag->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, string $slug)
    {
        $validatedTagData = $request->validated();

        $tag = Tag::where('slug', $slug)->firstOrFail();

        $validatedTagData['slug'] = Str::slug($validatedTagData['name']);

        $tag->update($validatedTagData);

        return redirect()->route('admin.tags.show',['tag'=>$tag->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }
}
