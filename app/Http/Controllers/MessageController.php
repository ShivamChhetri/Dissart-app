<?php

namespace App\Http\Controllers;

use App\message;
use Illuminate\Http\Request;
use App\Events\MessagePosted;
use App\User;
use Auth;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
       $msg= message::with('user')->get();
       return $msg; 
    }

    
    public function store(Request $request)
    {   
        $this->validate($request,[
            'body'=> "required"
        ]);
            

        $message=message::create([
            'body'=> request('body'),
            'user_id'=> auth()->id()
        ]);

        $user=Auth::user();

        broadcast(new MessagePosted($message, $user));
        // event(new MessagePosted($message, $user));


        return back();
        
    }

  
}
