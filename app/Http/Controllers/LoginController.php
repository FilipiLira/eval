<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;


use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        //var_dump($request->session()->get('user')->name);
        return '<h1>Bem vindo de volta ' . $user->name . '!</h1>';
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $req)
    {
        $allUsers = \App\User::all();

        $user = Socialite::driver('facebook')->user(); // retorna um objeto com os dados vindo da Api de alteticação

        $userf = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "avatar" => $user->avatar
        ];

        session(['userf'=> $userf]); // Armazenando os dados do usuário retornados pelo facebook na sessão para serem recuperados depois 

        return redirect('/home/authSocialite');
    }

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {
       /* $allUsers = \App\User::all();

        $user = Socialite::driver('google')->user(); // retorna um objeto com os dados vindo da Api de alteticação

        $exist = false;

        foreach ($allUsers as $value) { // verificando se o usuário já está presente na base de dados
            $value->email == $user->email ? $exist = true : $exist = false;
        }

        if (!$exist) {
            $newUser = \App\User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => ''
            ]);
            return $newUser;
        } else {

            return redirect('eval')->with('user', $user);
        }*/

        $allUsers = \App\User::all();

        $user = Socialite::driver('google')->user(); // retorna um objeto com os dados vindo da Api de alteticação
       
        $userf = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "avatar" => $user->avatar
        ];

        session(['userf'=> $userf]); // Armazenando os dados do usuário retornados pelo facebook na sessão para serem recuperados depois 

        return redirect('/home/authSocialite');
    }
}
