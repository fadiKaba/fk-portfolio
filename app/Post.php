<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Image;

class Post extends Model
{   protected $fillable = ['post_title', 'post_body','user_id'];

    public function user(){
        return $this->belongTo(User::class);
    }
    public function image(){
        return $this->hasOne(Image::class);
    }      
}
