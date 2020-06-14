<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
//use App\Evaluation_Product;

class EvaluationRepository{
    
    public function makeEvaluation($user, $product_id, $evaluation, $comment){
        $one = 'ONE';
        $two = 'TWO';
        $three = 'THREE';
        $four = 'FOUR';
        $five = 'FIVE';

        $valueKey = null;
        $valueId = null;

        if($evaluation == 1) 
            $valueKey = $one;
        else if($evaluation == 2) 
            $valueKey = $two;
        else if($evaluation == 3)
            $valueKey = $three;
        else if($evaluation == 4)
            $valueKey = $four;
        else if($evaluation == 5)
            $valueKey = $five;
  

        $evaluationObj = \App\Evaluation::where('key', $valueKey)->get();
        foreach ($evaluationObj as $value) {
            $valueId = $value->id;   
        }

        $newComment = new CommentRepository();
        $commentId = $newComment->makeComments($comment);

        //var_dump($commentId);
        //die;

        //$produto = \App\Product::find($product_id);

        $evaluation_product = \App\Evaluation_Product::create([
            'evaluation_id' => $valueId,
            'product_id' => $product_id,
            'user_id' => $user,
            'comment_id' => $commentId
        ]);

        

        //$produto->evaluation_products()->create($evaluation_product);



        //$registro = \App\Services\Evaluation_Product::find(1);

        // JOINs que trazem os dados dos produtos
        // $commentable = \App\Evaluation_Product::join('users', 'evaluation_product.user_id', '=', 'users.id')
        //                                         ->join('evaluations', 'evaluation_product.user_id', '=', 'evaluations.id')
        //                                         ->join('products', 'evaluation_product.product_id', '=', 'products.id')
        //                                         ->join('comments', 'evaluation_product.user_id', '=', 'comments.id')
        //                                         ->where('evaluation_product.id', '1')->get();

        // dd($commentable);
        // foreach ($commentable as $value) {
        //     var_dump($value);
        //     print('/////////////////////////////////////////////////////////////');
        // }

        // die;

        return redirect()->route('/');
    } 
}














?>