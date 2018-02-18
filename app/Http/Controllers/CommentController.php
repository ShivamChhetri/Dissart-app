<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\User;
use Auth;
use App\Notifications\RepliedToThread;
use App\post;

class CommentController extends Controller
{
    public function index($post_id){
        $comment= comment::where(['post_id'=>$post_id])
                        ->with('User')
                        ->orderby('id','desc')
                        ->get();
        return $comment;
    }

    public function store(Request $request,$post_id){
        
        $this->validate($request,[
            'comment'=> 'required'
        ]);

        $comment=comment::create([
            'comment' => request('comment'),
            'post_id' => $post_id,
            'user_id' => auth()->id()
        ]);

        //adding notification
        $post= post::find($post_id);
        if($comment->user->id != $post->user->id){
            $sender= auth()->user()->name;
            $post= post::find($post_id);
            $post->user->notify(new RepliedToThread($comment,$sender)); 
        }
        return back();
    }
}
