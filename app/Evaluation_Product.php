<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation_Product extends Model
{
    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }

    public function comment(){
        return $this->belongsTo(Comments::class);
    }
}
