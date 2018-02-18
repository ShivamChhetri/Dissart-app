<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
class SearchController extends Controller
{
    public function searching($title){
        $post= post::where('title','like','%'.$title.'%')->get();
        return $post;
    }

    public function search($title){
        $posts= post::where('title','like','%'.$title.'%')->get();
        $related= post::where('topic',$posts[0]->topic)->get();
        return view('inc.search')
               ->with('posts',$posts)
               ->with('related',$related);
    }
}
