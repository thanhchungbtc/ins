<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('sites.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('sites.projects.show', compact('project'));
    }
}
