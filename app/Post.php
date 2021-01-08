<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public  function user(){
      return $this->belongsTo(User::class);
  }

    public  function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    public  function city(){
        return $this->belongsTo(City::class,'city_id');
    }
}
