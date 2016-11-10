<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function showIndex()
    {

        return view('home')
            ->with('StylePath' , '/css/home.css')
            ->withTitle('Maël Mayon');
    }
}
