<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function posts(){
        return $this->hasMany(Post::class,'id');
    }
}
