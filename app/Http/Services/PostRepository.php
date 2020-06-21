<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
use Illuminate\Support\Facades\Auth;
use App\Discussion;

use App\User;
//use App\Evaluation_Product;

class PostRepository{
    public function createPost($request){
        $discussion = \App\Discussion::find($request->discussion);
        $userId = Auth::user()->id;

        $post = $discussion->post()->create([
            'title' => 'qualquer coisa',
             'type' => $request->type,
             'body' => $request->body,
             'user_id' => $userId,
             'discussion_id' => $request->discussion
        ]);

        return $post;
    }
}

?>