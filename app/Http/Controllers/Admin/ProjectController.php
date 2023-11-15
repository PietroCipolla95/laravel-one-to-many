<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use illuminate\Support\Str;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        if ($request->has('cover_image')) {
            $path = Storage::put('cover_images', $request->cover_image);
            $val_data['cover_image'] = $path;
        }

        $val_data['slug'] = Str::slug($request->title, '-');

        $newProject = Project::create($val_data);

        return to_route('admin.projects.show', $newProject)->with('message', 'You created a new project!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $val_data = $request->validated();

        if ($request->has('cover_image')) {

            $newCover = $request->cover_image;

            $path = Storage::put('cover_images', $newCover);

            if (!is_null($project->cover_image) && Storage::fileExists('cover_images', $project->cover_image)) {

                Storage::delete($project->cover_image);
            }

            $val_data['cover_image'] = $path;
        }


        $val_data['slug'] = Str::slug($request->title, '-');

        $project->update($val_data);

        return to_route('admin.projects.show', $project)->with('message', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        if (!is_null($project->cover_image)) {
            Storage::delete($project->cover_image);
        }

        $project->delete();

        return to_route('admin.projects.index')->with('message', 'You removed the project!');
    }
}
