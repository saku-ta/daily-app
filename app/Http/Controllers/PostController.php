<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    public function index(Post $post){
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(5)]);
    }
    
    public function show(Post $post){
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(User $user){
        return view('posts/create')->with(['users' => $user->get()]);
    }
    
    public function store(PostRequest $request, Post $post){
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post){
        return view('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $reqest, Post $post){
        $input_post = $reqest['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/'. $post->id);
    }
     public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
}
?>