<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
//use App\Evaluation_Product;

class ProductRepository{
    
    public function allProductsEvals($productsParam = null){
        $products = $productsParam ? $productsParam : \App\Product::all();
        //$productsPagenate = $products = \App\Product::paginate(2);

        $arrayEvaluationProductMed = [];

        foreach ($products as $product) {
            $evaluation_product = \App\Product::join('evaluation_product', 'evaluation_product.product_id', '=', 'products.id')
                                   ->join('evaluations', 'evaluation_product.evaluation_id', '=', 'evaluations.id')
                                   ->select('products.id', 'evaluations.key') 
                                   ->where('products.id', $product->id)->get();
            $evaluationArray = [];
            $evaluationMed = [];

            // Adicionando o Id do produto a o array, para que essa avaliação possa ser identificada na view
            $evaluationArray['productId'] = $product->id;

            foreach ($evaluation_product as $value) {

                // Atribuindo valor numério a avaliação de acordo com o texto da chave
                $valueEval = 0;
                if($value->key == 'ONE') 
                    $valueEval = 1;
                else if($value->key == 'TWO') 
                    $valueEval = 2;
                else if($value->key == 'THREE')
                    $valueEval = 3;
                else if($value->key == 'FOUR')
                    $valueEval = 4;
                else if($value->key == 'FIVE')
                    $valueEval = 5;
                
                $evaluationMed [] = $valueEval;
            }

            if(count($evaluationMed) >= 2){
                $media = array_sum($evaluationMed) / count($evaluationMed);
                $mediaEval = round($media, 1);
            } else {
                $mediaEval = array_sum($evaluationMed);
            }

            $evaluationArray['evalQuant'] = count($evaluationMed);
            $evaluationArray['evalMed'] = $mediaEval;
            array_push($arrayEvaluationProductMed, $evaluationArray);

            
        }

        //$productsAndEvaluations = ["products" => $products, "evalMeds" => $arrayEvaluationProductMed];
        
        return ["products" => $products, "evalMeds" => $arrayEvaluationProductMed];

        // return \App\Product::join('users', 'evaluation_product.user_id', '=', 'users.id')
        //                        ->join('evaluations', 'evaluation_product.evaluation_id', '=', 'evaluations.id')
        //                        ->join('products', 'evaluation_product.product_id', '=', 'products.id')
        //                        ->join('comments', 'evaluation_product.comment_id', '=', 'comments.id')
        //                        ->where('evaluation_product.id', '>', '0')->paginate(7);

        
    }

    public function oneProduct($productId){
        
         // se o valor do $productId for passado para esse método, quer dizer que devem ser retornadas
        // as informações de um unico produto
        $product = \App\Product::find($productId);

        //$productsPagenate = $products = \App\Product::paginate(2);

        $arrayEvaluationProductMed = [];

        
        // Esse código irá calcular o valor médio de avaliação de 1 produto, e armazenar no array
        $evaluation_product = \App\Product::join('evaluation_product', 'evaluation_product.product_id', '=', 'products.id')
                               ->join('evaluations', 'evaluation_product.evaluation_id', '=', 'evaluations.id')
                               ->select('products.id', 'evaluations.key') 
                               ->where('products.id', $product->id)->get();
        // $evaluationArray = [];
        $evaluationMed = [];    
        // Adicionando o Id do produto a o array, para que essa avaliação possa ser identificada na view
        $arrayEvaluationProductMed['productId'] = $product->id;    
        foreach ($evaluation_product as $value) {    
            // Atribuindo valor numério a avaliação de acordo com o texto da chave
            $valueEval = 0;
            if($value->key == 'ONE') 
                $valueEval = 1;
            else if($value->key == 'TWO') 
                $valueEval = 2;
            else if($value->key == 'THREE')
                $valueEval = 3;
            else if($value->key == 'FOUR')
                $valueEval = 4;
            else if($value->key == 'FIVE')
                $valueEval = 5;
            
            $evaluationMed [] = $valueEval;
        }    
        if(count($evaluationMed) >= 2){
            $media = array_sum($evaluationMed) / count($evaluationMed);
            $mediaEval = round($media, 1);
        } else {
            $mediaEval = array_sum($evaluationMed);
        }    
        // $evaluationArray['evalQuant'] = count($evaluationMed);
        // $evaluationArray['evalMed'] = $mediaEval;
        $arrayEvaluationProductMed['evalQuant'] = count($evaluationMed);
        $arrayEvaluationProductMed['evalMed'] = $mediaEval;

        //$productsAndEvaluations = ["products" => $products, "evalMeds" => $arrayEvaluationProductMed];
        
        return ["product" => $product, "evalMed" => $arrayEvaluationProductMed];

        // return \App\Product::join('users', 'evaluation_product.user_id', '=', 'users.id')
        //                        ->join('evaluations', 'evaluation_product.evaluation_id', '=', 'evaluations.id')
        //                        ->join('products', 'evaluation_product.product_id', '=', 'products.id')
        //                        ->join('comments', 'evaluation_product.comment_id', '=', 'comments.id')
        //                        ->where('evaluation_product.id', '>', '0')->paginate(7);

    }

    public function allUserProducts($user){
        $products = \App\Product::where('user_id', $user)->get();
        $userProducts = $this->allProductsEvals($products);

        return $userProducts;
    }
}



?>
