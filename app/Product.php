<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use PhpParser\Builder\Class_;

class Product extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'description', 'image'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
