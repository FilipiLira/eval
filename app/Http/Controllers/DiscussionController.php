<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductRepository;
use App\Http\Services\DiscussionRepository;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function discussionForm($productId, ProductRepository $productR){

        $productAndEvaluation = $productR->oneProduct($productId);
        $product = $productAndEvaluation["product"];
        $evalMed = $productAndEvaluation["evalMed"];
        // dd($evalMed);
        // die;

        return view('forms.discussionForm', compact('product', 'evalMed'));

    }

    public function createDiscussion(Request $req, DiscussionRepository $discussion){
        $created = $discussion->makeDiscussion($req);

        return redirect()->route('/');
    }

    public function discussionsPage($productId, DiscussionRepository $discussion){
        $discussionsProduct = $discussion->allDiscussionsProduct($productId);
        $product = \App\Product::find($productId);

        return view('discussions.discussionsProduct', compact('discussionsProduct', 'product'));
    }

    public function discusionPage($discussionId, DiscussionRepository $discussionR){
        $user = false;
        if(Auth::check() === true){
            $user = \App\User::find(Auth::user()->id);
        }

        $discussion = \App\Discussion::find($discussionId);
        $product = \App\Product::find($discussion->product_id);

        $discussionPosts = $discussionR->discussionPosts($discussionId);

        // foreach ($discussionPosts as $key => $post) {
        //     dd($post['post']->id);
        // }

        // dd($discussionPosts);
        // die;

        return view('discussions.discussionPage', compact('discussionPosts', 'discussionId', 'product', 'user'));
    }

    public function userDiscussions($userId, DiscussionRepository $discussionR){

        $discussions = $discussionR->allDiscussionsUser($userId);

        return view('user.userDiscussions', compact('discussions'));
    }
}
