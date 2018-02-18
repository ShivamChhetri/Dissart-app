<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\post;

class NotificationController extends Controller
{
    public function markread($notificationId,$post_id){
        $notification=auth()->user()->notifications()->findOrFail($notificationId);
        if($notification->read_at==NULL){
            auth()->user()->unreadNotifications()->findOrFail($notificationId)->markAsRead();
        }
        $post= post::find($post_id);
        return view('notificationPage')->with('post',$post);
    }

    public function markreadall(){
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    }
}
