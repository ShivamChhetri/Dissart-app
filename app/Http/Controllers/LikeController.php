<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\like;
use Auth;

class LikeController extends Controller
{
    public function isLikedByMe($id)
    {
        if (like::whereUserId(Auth::id())->wherePostId($id)->exists()){
            return 'true';
        }
        return 'false';
    }
    
    public function like(Request $request)
    {   
        $post_id= request('postid');
        $existing_like = like::withTrashed()->wherePostId($post_id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            like::create([
                'post_id' => $post_id,
                'user_id' => Auth::id()
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
