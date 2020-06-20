<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    //use Notifiable;

    protected $fillable = [
        'evaluKey'
    ];

    /*public function evaluation_product(){
        return $this->hasMany(Evaluation_Product::class);
    }*/

    /*public function  evaluation_products()
    {
        return $this->morphMany('App\Evaluation_Product', 'evaluation');
    }*/
}
