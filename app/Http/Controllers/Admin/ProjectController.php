<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// Form Request
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

// Helper
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $types = Type::all();

        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $tags = Tag::all();

        return view('admin.projects.create', compact('types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedProjectData = $request->validated();

        $coverImage = null;
        if (isset($validatedProjectData['cover_img'])) {
            $coverImage = Storage::disk('public')->put('img', $validatedProjectData['cover_img']);;
        }

        $validatedProjectData['cover_img'] = $coverImage;
        $validatedProjectData['slug'] = Str::slug($validatedProjectData['title']);

        $project = Project::create($validatedProjectData);

        if (isset($validatedProjectData['tags'])) {
            foreach ($validatedProjectData['tags'] as $singleTagId) {
                
                $project->tags()->attach($singleTagId);
            }
        }

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {

        $project = Project::where('slug', $slug)->firstOrFail();
        $types = Type::all();
        $tags = Tag::all();

        return view('admin.projects.edit', compact('project', 'types', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $slug)
    {
        $validatedProjectData = $request->validated();
        $project = Project::where('slug', $slug)->firstOrFail();

        $coverImage = $project->cover_img;

        if (isset($validatedProjectData['cover_img'])) {
            if ($coverImage != null) {
                Storage::disk('public')->delete($project->cover_img);
            }

            $coverImage = Storage::disk('public')->put('img', $validatedProjectData['cover_img']);
        }
        else if (isset($validatedProjectData['delete_cover_img'])) {
            Storage::disk('public')->delete($project->cover_img);

            $coverImage = null;
        }
        

        $validatedProjectData['cover_img'] = $coverImage;
        $validatedProjectData['slug'] = Str::slug($validatedProjectData['title']);

        $project->update($validatedProjectData);

        if (isset($validatedProjectData['tags'])) {
            $project->tags()->sync($validatedProjectData['tags']);
        }
        else {
            $project->tags()->detach();
        }

        return redirect()->route('admin.projects.show',['project'=>$project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {   
        $project = Project::where('slug', $slug)->firstOrFail();

        if ($project->cover_img != null) {
            Storage::disk('public')->delete($project->cover_img);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
