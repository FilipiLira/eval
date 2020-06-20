<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{

    protected $fillable = [
        'user_id', 'product_id', 'topic', 'topic_description'
    ];

    protected $casts = [
        
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
