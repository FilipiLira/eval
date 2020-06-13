<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Services\ImageRepository;

class ProductController extends Controller
{
    public function productForm(){

        return view('forms.productForm');
    }

    public function create(Request $req, ImageRepository $imgsave){
        $userLogged = Auth::user()->id;
        $user = \App\User::find($userLogged);

        $img = $imgsave->saveImage($req);
        
        $user->product()->create([
            'name' => $req->name,
            'description' => $req->description,
            'image' => $imgsave->saveImage($req)
        ]);

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
}
