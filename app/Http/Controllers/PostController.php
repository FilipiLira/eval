<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostRepository;

class PostController extends Controller
{
    public function createPost(Request $req, PostRepository $postRepository){
        $post = $postRepository->createPost($req);

        return redirect()->to(url()->previous());
    }
}
