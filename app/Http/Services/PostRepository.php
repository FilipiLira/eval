<?php 
namespace App\Http\Services;
use App\Http\Services\CommentRepository;
use Illuminate\Support\Facades\Auth;
use App\Discussion;
use App\Http\Services\NotificationRepository;

use App\User;
//use App\Evaluation_Product;

class PostRepository{
    public function createPost($request){
        $discussion = \App\Discussion::find($request->discussion);

        // Pegando o id do usuario que criou a discursão para determinar se ao se criar um post deve-se ou não ser criada
        // uma notificação, já que se é ele mesmo que está comentado, não deve ser gerada a notificação
        $userDiscussionId = \App\Discussion::where('id', $request->discussion)->get()[0]->user_id;
       
        $userId = Auth::user()->id;

        $post = $discussion->post()->create([
            'title' => 'qualquer coisa',
             'type' => $request->type,
             'body' => $request->body,
             'user_id' => $userId,
             'discussion_id' => $request->discussion
        ]);

        // Se o usuário que criou o post for diferente do usuário logado
        if($userDiscussionId != $userId){
            // Pegando Id o post que acabou de ser cadastrado
            $postId = \App\Post::all()->last()->id;

            $notificationR = new NotificationRepository();
    
            // Criado uma notificação para o dono do post
            $notificationR->makeNotification($userDiscussionId, $request->discussion, $postId);
        }

        return $post;
    }
}

?>
