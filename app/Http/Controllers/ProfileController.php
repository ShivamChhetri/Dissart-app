<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        // $user= auth()->user();
        $user= User::where('name',$name)->first(); 
        return view('profile',compact('user'));
    }
   
    public function profilepic(Request $request)
    {
       if($request->hasFile('profilepic')){
           $profilepic= $request->file('profilepic');
           $filename= time().'.'. $profilepic->getClientOriginalExtension();
           Image::make($profilepic)->resize(300,300)->save(public_path('profile_pic/'.$filename));

            $user= Auth::user();
            $user->profilepic= $filename;
            $user->save();   
            return back();        
       }
    }
}
