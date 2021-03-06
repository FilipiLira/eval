<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
use Illuminate\Support\Facades\Auth;
use App\Product;
use \App\Discussion;

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
                                            ->join('users', 'discussions.user_id', '=', 'users.id')
                                            ->select('discussions.*', 'users.name', 'users.created_at AS user_created_at')
                                            ->where('products.id', $productId)->paginate(4);
        
        return $discussionsProduct;
    }

    public function discussionPosts($discussionId){
        $discussionPosts = \App\Post::join('discussions', 'discussions.id', '=', 'posts.discussion_id')
                                            ->join('users', 'users.id', '=', 'posts.user_id')
                                            ->select('discussions.*', 'users.name', 'posts.*' ,'posts.id AS post_id', 'posts.created_at AS post_created', 'users.created_at AS user_created_at')
                                            ->where('discussions.id', $discussionId)->get();//paginate(4);

                                            // dd($discussionPosts);
                                            // die;

        $discussionPostsLikes = [];
        $fullPostData = [];

        foreach ($discussionPosts as $key => $post) {
            $likes = \App\Like::join('users', 'likes.user_id', 'users.id')
                                ->select('likes.*', 'users.name', 'users.id')
                                ->where('post_id', $post->post_id)->get();

            $discussionPostsLikes['post'] = $post;
            $discussionPostsLikes['likes'] = $likes;

            array_push($fullPostData, $discussionPostsLikes);
        }

        return $fullPostData;
    }

    public function allDiscussionsUser($userId){
        $allDiscussions = \App\Discussion::join('users', 'users.id', 'discussions.user_id')
                                           ->select('discussions.*', 'users.created_at as user_created_at')
                                           ->where('user_id', $userId)->paginate(3);

        return $allDiscussions;
    }
}
