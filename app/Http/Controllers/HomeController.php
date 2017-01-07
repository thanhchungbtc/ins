<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->take(8)->get();
    	return view('sites/home/index', compact('projects'));
    }

}
