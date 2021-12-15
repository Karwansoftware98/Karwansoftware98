<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function  addpost(){
        return view('add-post');
    }
    public function createPost(Request $request){
        $post = new Post();
        $post->title=$request->title;
        $post->body= $request->body;
        $post->save();
        return redirect('posts')->with('post_created','post has been created successfully!');
    }

    public function getPosts(){
        $posts = Post::orderBy('id','DESC')->get();
        return view('posts',compact('posts'));
    }
    public function getPostById($id){
        $post = Post::where('id',$id)->first();
        return view('single-post',compact('post'));
    }
    public function deletePost($id){
         Post::where('id',$id)->delete();
         return back()->with('deleted','post deleted successfuly');

    }
    public function editPost($id){

        $posts =  Post::find($id);

        return view('edit-post',compact('posts'));
    }
    public function updatePost(Request $request,$id){

        $post = Post::find($id);
        $post->id = $request->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect('posts')->with('success','successfully updated');
    }
}
