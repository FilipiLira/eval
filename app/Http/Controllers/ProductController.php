<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Services\ImageRepository;
use App\Http\Services\EvaluationRepository;
use App\Http\Services\ProductRepository;

class ProductController extends Controller
{
    public function productForm(){

        return view('forms.productForm');
    }

    public function create(Request $req, ImageRepository $imgSave, EvaluationRepository $mkEvaluation){
        $userLogged = Auth::user()->id; // id do usuário logado
        $user = \App\User::find($userLogged); // recuperando dados do user

        $img = $imgSave->saveImage($req); // salvando imagem do produto
        
        $user->product()->create([ // salvando produtos
            'name' => $req->name,
            'description' => $req->comment,
            'image' => $imgSave->saveImage($req)
        ]);

        $produtosId = \App\Product::all()->last()->id; // pegando id do ultimo produto incerido


        $mkEvaluation->makeEvaluation($userLogged, $produtosId, $req->evaluation, $req->comment);

        // var_dump($produtosId);
        // die;

        $allProductsUser = \App\Product::where('user_id', $userLogged)->get();

        return redirect()->route('home.home')->with('allProductsUser');
    }

    public function imgReq($imgName){
        //$file = Storage::url('app/products/'.$imgName.'');

        // Os arquivos armazenados na storage não podem ser acessados diretamente por uma view 
        // para isso se passa uma rota para a view, essa rota, como essa aqui, retorna o caminho para o arquivo
        // ou faz o download da imgem, mas para isso é preciso criar um link entre a a storage e a pasta public
        // com o comando php artisan storage:link
        // os arquivos que precisam ser acessados na storage, precisam ficar na pasta storage/app/public/..subpastas..arquivos
        //
        //$pathToFile= asset('storage/products/'.$imgName.''); //Isso retorna uma url para a imagem
        return response()->download('storage/products/'.$imgName.''); // realiza o download do arquivo passado como parametro
        //$exists = Storage::disk('s3')->exists($imgName);
        //$url = Storage::get($imgName);
        //return $url;
        
    }

    public function evaluationProductForm($productId, ProductRepository $product, EvaluationRepository $evaluation){

        $productAtributs =  $product->oneProduct($productId);
       

        //dd($allEvaluationsProduct);
        //die;

        $productAndEvaluation = $product->oneProduct($productId);
        $allEvaluationsProduct = $evaluation->allEvaluationsProduct($productId);
        $product = $productAndEvaluation["product"];
        $evalMed = $productAndEvaluation["evalMed"];
        // dd($evalMed);
        // die;

        return view('forms.evaluationForm', compact('product', 'evalMed', 'allEvaluationsProduct'));
    }

    public function userProducts($user, ProductRepository $productsR){
        $userProducts = $productsR->allUserProducts($user);

        // dd($userProducts);
        // die;
        return view('user.userProducts', compact('userProducts'));
    }

    public function search(Request $req, ProductRepository $productsR){
        // $result = \App\Product::where('name', '%'.$string.'%');
        
        $productsSearch = \App\Product::where('name', 'LIKE', '%'.$req->search.'%')->get();
        $productsAndEvaluationsMed = $productsR->allProductsEvals($productsSearch);

        $products = $productsAndEvaluationsMed["products"];
        $evalMeds = $productsAndEvaluationsMed["evalMeds"];
        // dd($evalMeds);
        // die;
        return view('index', compact('products', 'evalMeds'));
    }
}
