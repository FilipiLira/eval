<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function createUpdateLike(Request $req, LikeRepository $likeR ){
        $userId = Auth::user()->id;
        $postId = $req->post_id;
        $like = $likeR->makeUpdateLike($userId, $postId);

        if($like){
            return 'like';
        }
    }
}
