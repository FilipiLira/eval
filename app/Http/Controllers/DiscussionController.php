<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductRepository;
use App\Http\Services\DiscussionRepository;


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
}
