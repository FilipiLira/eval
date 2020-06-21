<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notificationsUserAjax($userId){
       $notifications = \App\Notification::join('posts', 'notifications.post_id', '=', 'posts.id')
                                           ->join('discussions', 'notifications.discussion_id', '=', 'discussions.id')
                                           ->join('products', 'discussions.product_id', '=', 'products.id')
                                           ->join('users', 'posts.user_id', '=', 'users.id')
                                           ->select('posts.body', 'posts.created_at AS datePost', 'discussions.topic AS discussion', 'discussions.id AS discussionId', 'products.name As product', 'users.name')
                                           ->where('notifications.user_id', intval($userId))->get();
       
       return json_encode($notifications);
    }
}
