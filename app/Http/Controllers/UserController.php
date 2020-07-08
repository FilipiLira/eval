<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editPerfil($userId){
        $userData = \App\User::find($userId);

        return view('forms.editPerfil', compact('userData'));
    }
}
