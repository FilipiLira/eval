<?php 
namespace App\Http\Services;
use App\Like;

use App\User;
//use App\Evaluation_Product;

class LikeRepository{
    public function makeUpdateLike($userId, $postId){

        // verificando se já existe um registro na tabela like, isso indica que já foi dado um like, e nesse caso séra um deslike
        $hasLike = \App\Like::where('user_id', '=', $userId)->where('post_id', '=', $postId)->count();

        if($hasLike){
            \App\Like::where('user_id', '=', $userId)->where('post_id', '=', $postId)->delete();

            return false;
        } else {
            $like = \App\Like::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);

            return $like;
        }
    }

    public function allLikesPost($postId){
        
        $likes = \App\Like::join('users', 'likes.user_id', 'users.id')
                            ->where('post_id', $postId);

        return $likes;
    }
}

?>