<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    public function verifyAuth(){
        if(Auth::check() === true){
            return view('home');
        }

        return redirect()->route('home.authSocialite.do');
    }

    public function login(Request $req){
        $userSocialite = $req->session()->get('userf'); // pegando o array que armazenei na sessão em LoginController@handleProviderCallback 

        $userDB = \App\User::where('email', $userSocialite['email'])->get(); // pegando o usuário com o email corespondente ao qu veio. Lembrar de mudar pra um código
        $credentials = [];
        
        foreach ($userDB as $user) { // Percorrendo a collection para armazenar os valore em um array
            $credentials = [
                "id" => $user->id,
                "email" => $user->email,
                "password" => ''
            ];
           //print($credentials['password']);
        }
        
        if(isset($credentials['id'])){ // se existir o registro do email no banco
            Auth::loginUsingId($credentials['id']); // altenticando via id de usuário
            
            if(Auth::check() === true){ // se existir usuário altenticado, redirect para a pagina home da aplicação
                //return 'sessão iniciada';
                return redirect()->route('home.home');
            } else {
               return view('auth.register', compact('userSocialite')); // se não redireciona para o formulário de cadastro passando dados para deixar o formulário pré preenchido

            }
        } else{
            return view('auth.register', compact('userSocialite'));// se não redireciona para o formulário de cadastro passando dados para deixar o formulário pré preenchido
        }

    }
}
