<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $userId, $postId){
        $request->validate([
            'body' => 'required|max:300'
        ]);
        
       $comment =  Comment::create([
            'user_id' => $userId,
            'post_id' => $postId,
            'body' => $request->body,
        ]);

        return json_encode($comment);
    }
}
