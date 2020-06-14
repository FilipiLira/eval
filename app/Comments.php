<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'description', 'content'
    ];

    /*public function  evaluation_products()
    {
        return $this->morphMany('App\Evaluation_Product', 'comment');
    }*/
}
