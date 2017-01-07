<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('category')->get();
        return view('admins.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        // save project
        $project = new Project($request->all());
        $project->save();

        // upload photos
        $files = $request->file('photo');
        $project->addPhotos($files);

        // redirect
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::with('photos')->where('id', $id)->firstOrFail();
        return view('admins.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::with('photos')->where('id', $id)->firstOrFail();
        $project->update($request->all());

        // upload photos
        $project->addPhotos($request->file('photo'));

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     * return json, eg: { message: true, id: 2 }
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        return response([
            'message' => $project->delete(),
            'id' => $project->id
        ], 200);
    }
}
