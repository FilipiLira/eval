<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
//use App\Evaluation_Product;

class ProductRepository{
    
    public function allProducts(){
        return \App\Evaluation_Product::join('users', 'evaluation_product.user_id', '=', 'users.id')
                               ->join('evaluations', 'evaluation_product.user_id', '=', 'evaluations.id')
                               ->join('products', 'evaluation_product.product_id', '=', 'products.id')
                               ->join('comments', 'evaluation_product.user_id', '=', 'comments.id')
                               ->where('evaluation_product.id', '>', '0')->paginate(7);

        //dd($a);
        //die;
    }
}



?>