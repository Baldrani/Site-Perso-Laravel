<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function showIndex()
    {
        $specificHeader = '<link rel="stylesheet" href="/css/home.css" media="screen" title="Template"><script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"></script>';

        return view('home')
            ->with('specificHeader' , $specificHeader)
            ->withTitle('Maël Mayon');
    }
}
