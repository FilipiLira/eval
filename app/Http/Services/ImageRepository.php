<?php 
namespace App\Http\Services;

class ImageRepository{

    public function saveImage($req){
       // Upload a imagem
        //var_dump($req->product_image);
      // die;

      $fileName = null;

      if($req->hasFile('product_image') && $req->file('product_image')->isValid()){ // verifica se o arquivo image existe na req, e se é um arquivo válido

        $fileName = uniqid(date('HisYmd')); // definindo uma valor aleatório com base na data atua  
        //recuperando a extensão do arquivo
        $extesion = $req->product_image->extension();
        // Concatenando para formar o nome
        $fileName = $fileName .'.'. $extesion;

        //$destinationPath = public_path('products');
        
        //$url = 'http://'.$_SERVER['HTTP_HOST'].'/products/'.$fileName;
        // fazendo o upload, passando o nome da pasta em storage/app/public/products
        $upload = $req->product_image->storeAs('public/products', $fileName);
        // verificando erros
        if ( !$upload ){

          return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        } else {
          return $fileName;
        }


      }
    }
}
?>
