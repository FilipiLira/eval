<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
use Illuminate\Support\Facades\Auth;
use App\Product;

use App\User;
//use App\Evaluation_Product;

class DiscussionRepository{

    public function makeDiscussion($request){
        $userLogged = Auth::user()->id;
        $user = \App\User::find($userLogged);

        $created = $user->discussion()->create([
            'user_id' => $user,
            'product_id' => $request->product,
            'topic' => $request->topic,
            'topic_description' => $request->topic_description
        ]);

        return $created;
    }

    public function allDiscussionsProduct($productId){

        $discussionsProduct = \App\Product::join('discussions', 'discussions.product_id', '=', 'products.id')
                                            ->select('discussions.*')
                                            ->where('products.id', $productId)->paginate(4);
        
        return $discussionsProduct;
    }
}