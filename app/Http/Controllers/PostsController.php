<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Image;
use File;
use ImageResize;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::orderBy('created_at','desc')->get();
        return view('/admin/admin-posts')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $nPost = Post::create([
            'post_title' => $request->title,
            'post_body' => $request->body,
            'user_id' => Auth::id(),
        ]);
        if($request->image != null){
            $imageName = 'img'.time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
    
            Image::create([
                'post_id' => $nPost->id,
                'url' => $imageName,
            ]);
        }
        
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::findOrFail($id);
        return view('/admin/edit-post')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        
        $post = Post::findOrFail($id);

        if($request->image != null){
            if(File::exists(public_path('/images/'.$post->image->url))){
                File::delete(public_path('/images/'.$post->image->url));
                $imageName = 'img'.time().'.'.$request->image->extension();
                $request->image->move(public_path('images'),$imageName);
                $img= Image::findOrFail($post->image->id);
                $img->delete();
                Image::create([
                    'post_id' => $post->id,
                    'url' => $imageName,
                ]);
            }
        }

        $post->update([
            'post_title' => $request->title,
            'post_body' => $request->body,
        ]);
        return redirect()->back()->with('success', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $post = Post::findOrFail($id);

        if($post->image != null){
            if(File::exists(public_path('/images/'.$post->image->url))){
                File::delete(public_path('/images/'.$post->image->url));
                }
        }
        
        $post->delete();

        return redirect('admin/posts')->with('success','Post successfully deleted');
    }

    public function search(Request $val)
    {
        $posts = Post::all();
        $search = Post::where('post_title', 'Like', "%$val->val%")->get();
        return $search; 
    }
    public function goToSearch(Request $request)
    {
        $posts = Post::where('post_title', 'LIKE', "%$request->sresult%")->get();
        return view('/admin/admin-posts')->with(compact('posts'));
    }
    public function like($userId, $postId){
        
       $post = Post::findOrFail($postId);
        
       $postArr = explode(",", $post->likes);

       if(!in_array($userId, $postArr)){
           array_push($postArr, $userId);
           $postStr = implode(",", $postArr);
           $post->likes = $postStr;
           $post->save();
           return 'like';
       }
       $index = array_search($userId, $postArr);
       unset($postArr[$index]);
       $postStr = implode(',', $postArr);
       $post->likes = $postStr;
       $post->save();
        return 'unlike';
    }
}
