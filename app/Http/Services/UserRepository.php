<?php 
namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;

class UserRepository{
    public function userUp($req){

        $userLogged = Auth::user()->id;
        
        $userData = \App\User::find($userLogged);

        $userData->name = $req->name;
        $userData->email = $req->email;
        $userData->password = $req->password;

        $success = $userData->save();
    }

    public function userDelete($user){
        // verificando registros de outras tabelas relacionados a este usuário
        
        // Verificando produtos

        \App\Notification::where('user_id', $user)->delete();

        return redirect()->route('home.home');
    }
}