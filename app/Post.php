<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Discussion;

class Post extends Model
{
    protected $fillable = [
        'title', 'type', 'body', 'user_id', 'discussion_id'
    ];

    public function discussion(){
        return $this->belongsTo(Discussion::class);
    }

    public function like(){

        return $this->hasOne(Like::class);
    }
}
