<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

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

        return json_encode(Comment::where('id',$comment->id)->with('user')->get());
    }
    public function destroy($userId, $commentId){
        $user = User::findOrFail($userId);
        $comment = Comment::findOrfail($commentId);
        if($comment->user_id == $userId || $user->id){
            $comment->delete();
            return json_encode($commentId);
        }       
    }
    public function like($userId, $commentId){
        $comment = Comment::findOrFail($commentId);
        
       $commentArr = explode(",", $comment->likes);

       if(!in_array($userId, $commentArr)){
           array_push($commentArr, $userId);
           $commentStr = implode(",", $commentArr);
           $comment->likes = $commentStr;
           $comment->save();
           return 'like';
       }
       $index = array_search($userId, $commentArr);
       unset($commentArr[$index]);
       $commentStr = implode(',', $commentArr);
       $comment->likes = $commentStr;
       $comment->save();
        return 'unlike';
    }
}
