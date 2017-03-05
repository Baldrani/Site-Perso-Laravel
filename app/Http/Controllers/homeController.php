<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function showIndex()
    {
        $specificHeader = '<link rel="stylesheet" href="/css/home.css" media="screen" title="Template">';

        return view('home')
            ->with('specificHeader' , $specificHeader)
            ->withTitle('Maël Mayon');
    }

    public function showCalendar(){

        // data(){
        //     return{
        //         today: moment(),
        //         dateContext: moment(),
        //         days: ['S', 'M', 'T', 'W', 'T', 'F', 'S']
        //     }
        // },


        $specificHeader = '<link rel="stylesheet" href="/css/home.css" media="screen" title="Template">';

        return view('calendar')
            ->with('specificHeader', $specificHeader)
            ->withTitle('Calendrier');
    }
}
