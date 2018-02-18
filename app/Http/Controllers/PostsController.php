<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\User;


class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }


    public function welcome()
    {
        $posts= post::orderBy('id','desc')->get();
        if(request('topic')){
        $posts=$posts->where('topic',request('topic'));
        }
        $topics= post::select('topic')->groupBy('topic')->get();

       
        return view('layouts.welcome')
               ->with('posts',$posts)
               ->with('topics',$topics);

    }

   
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'topic' => 'required',
            'content' => 'required|max:500'
        ]);
        
        
        post::create([
            'title'=> request('title'),
            'topic' => request('topic'),
            'content' => request('content'),
            'user_id'=> auth()->id()
        ]);

        return redirect('/');

    }
 
    public function edit($id)
    {
        $post=post::find($id);
        return view('post.edit')->with('post',$post);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'content' => 'required'
        ]);
        
        $post= post::find($id);
        $post->title= request('title');
        $post->content= request('content');

        $post->save();
        // post::create([
        //     'title'=> request('title'),
        //     'body' => request('body')
        // ]);
      
        return redirect('/');

    }

    
    public function destroy($id)
    {
        $post= post::find($id);
        $post->delete();
        return redirect('/');
    }

}
