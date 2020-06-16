<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
//use App\Evaluation_Product;

class ProductRepository{
    
    public function allProducts(){
        $products = \App\Product::all();

        foreach ($products as $key => $product) {
            $evaluation_product = \App\Product::join('evaluation_product', 'evaluation_product.product_id', '=', 'products.id')
                                   ->join('evaluations', 'evaluation_product.evaluation_id', '=', 'evaluations.id')
                                   ->select('products.*', 'evaluation_product.*', 'evaluations.*') 
                                   ->where('products.id', $product->id)->get();
            $evaluationArray = [];
            foreach ($evaluation_product as $value) {
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

                $evaluationArray[] = $valueEval;
            }

            if(count($evaluationArray) >= 2){
                $mediaEval = array_sum($evaluationArray) / 2;
            } else {
                $mediaEval = array_sum($evaluationArray);
            }

            

            dd($mediaEval);
            die;
        }

        
        return \App\Product::join('users', 'evaluation_product.user_id', '=', 'users.id')
                               ->join('evaluations', 'evaluation_product.evaluation_id', '=', 'evaluations.id')
                               ->join('products', 'evaluation_product.product_id', '=', 'products.id')
                               ->join('comments', 'evaluation_product.comment_id', '=', 'comments.id')
                               ->where('evaluation_product.id', '>', '0')->paginate(7);

        
    }

    public function oneProduct($productId){
        
        return \App\Product::find($productId);
    }
}



?>
