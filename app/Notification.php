<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'discussion_id', 'post_id', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
