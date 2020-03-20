<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Image;
use App\Comment;

class Post extends Model
{   protected $fillable = ['post_title', 'post_body','user_id', 'likes'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function image(){
        return $this->hasOne(Image::class);
    } 
    public function comment(){
        return $this->hasMany(Comment::class);
    }     
}
