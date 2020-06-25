<?php 
namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

use App\User;
//use App\Evaluation_Product;

class LikeRepository{
    public function makeUpdateLike($userId, $postId){

        // verificando se já existe um registro na tabela like, isso indica que já foi dado um like, e nesse caso séra um deslike
        $hasLike = \App\Like::where('user_id', '=', $userId)->where('post_id', '=', $postId);

        if($hasLike){
            $hasLike->delete();
        } else {
            $like = \App\Like::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
        }

        return $like;
    }
}

?>