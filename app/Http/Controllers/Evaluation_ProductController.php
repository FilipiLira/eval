<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\EvaluationRepository;

class Evaluation_ProductController extends Controller
{
    public function evaluationProductCreate(Request $req, EvaluationRepository $mkEvaluation){
        $userLogged = Auth::user()->id; // id do usuário logado
        $user = \App\User::find($userLogged); // recuperando dados do user

        $produtosId = \App\Product::all()->last()->id; // pegando id do ultimo produto incerido


        $newEvaluation = $mkEvaluation->makeEvaluation($userLogged, $req->product, $req->evaluation, $req->comment);

        return redirect()->route('/');
    }
}
