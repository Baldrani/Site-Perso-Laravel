<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showProjects($name){

        return view('projects.'.$name);
    }
}
