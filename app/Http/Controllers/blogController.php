<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class blogController extends Controller
{
    public function showIndex()
    {
        return view('welcome');
    }
}
