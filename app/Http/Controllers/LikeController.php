<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LikeRepository;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function createUpdateLikeAjax(Request $req, LikeRepository $likeR ){
        $userId = Auth::user()->id;
        $postId = $req->postId;
        $like = $likeR->makeUpdateLike($userId, $postId);

        if($like){
            return $like;
        }

        // return $userId;
    }

    public function likesPostAjax($postId, LikeRepository $likeR){
        $likes = $likeR->allLikesPost($postId);

        return json_encode($likes);
    }
}
