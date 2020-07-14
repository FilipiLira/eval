<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Services\UserRepository;

class UserController extends Controller
{
    public function editPerfil($userId){
        $userData = \App\User::find($userId);

        return view('forms.editPerfil', compact('userData'));
    }

    public function userUpdate(Request $req, UserRepository $userR){
       
        $success = $userR->userUp($req);
        
        flash('Dados atualizados com sucesso!')->success();

        return redirect()->route('home.home');
    }

    public function deletePerfil($user){
        
        \App\Notification::where('user_id', $user)->delete();
        \App\Like::where('user_id', $user)->delete();
        \App\Post::where('user_id', $user)->delete();
        \App\Discussion::where('user_id', $user)->delete();
        \App\Evaluation::where('user_id', $user)->delete();
        \App\Product::where('user_id', $user)->delete();
        \App\User::where('user_id', $user)->delete();


        return redirect()->route('/');
    }
}
