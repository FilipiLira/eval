<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation_Product extends Model
{
    protected $table = 'evaluation_product';

    protected $fillable = [
        'evaluation_id', 'product_id', 'user_id', 'comment_id'
    ];

    /*public function evaluation_product()
    {
        return $this->morphTo();
    }*/
}
