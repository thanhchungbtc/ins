<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('sites.pages.about');
    }

    public function contact()
    {
        return view('sites.pages.contact');
    }
}
