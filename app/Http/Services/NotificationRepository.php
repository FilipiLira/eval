<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
use Illuminate\Support\Facades\Auth;
use App\Discussion;
//use App\Evaluation_Product;

class NotificationRepository{
    public function makeNotification($userId, $discussionId, $postId){
        $user = \App\User::find($userId);

        $notification = $user->notification()->create([
            'user_id' => $userId,
            'discussion_id' => $discussionId,
            'post_id' => $postId,
            'status' => 1
        ]);

        return $notification;
    }
}

?>