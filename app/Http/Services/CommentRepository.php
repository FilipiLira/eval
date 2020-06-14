<?php 
namespace App\Http\Services;

class CommentRepository{
    
    public function makeComments($comment){
       
        
        $newComment = \App\Comments::create([
            'description' => 'a',
            'content' => $comment 
        ]);

        return $newComment->id;
    }
}














?>