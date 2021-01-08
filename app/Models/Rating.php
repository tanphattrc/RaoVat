<?php

namespace App\Models;
use App\User;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,'ra_user_id');

    }
    public function post()
    {
        return $this->belongsTo(Post::class,'ra_post_id');
    }
}
