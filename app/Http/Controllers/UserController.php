<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function doLogin(Request $request)
     {
         $message = 'Email ou mot de passe incorrect.';
         $user = User::where('email', '=', $request->email)->first();
         if(isset($user)) {
             if (\Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
                 return redirect($_SERVER['HTTP_REFERER']);
             }
         }

         return redirect('/')
             ->with('message', $message)
             ->withInput();
     }

}
