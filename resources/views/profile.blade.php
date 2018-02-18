@extends('layouts.app')


@section('content')
@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif
<div>
    <div style="display:flex;">
        <img src="/profile_pic/{{$user->profilepic}}" alt="Profile picture"  style="height:150px;width:150px;border-radius:80px;border:1px solid black;margin-right:25px;">
        <h2>{{$user->name}}</h2>
    </div>

    @if(auth()->user()==$user)
    <form method="POST" enctype="multipart/form-data" action="/profilepic">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label v-show="picture" @click="upload()" class="btn btn-primary">Change profile pic<input type="file" style="display:none;" name="profilepic"></label>
        <button v-show="!picture" type="submit" class="btn btn-primary text-center">Upload</button>
    </form>
    @endif
</div>
<hr>
<div>
    <ul class="list-group">
        <li class="list-group-item">Your Articles</li>
    </ul>
    @foreach($user->posts as $post)
        <br>@include('post.show')
    @endforeach
</div>   
@endsection

@section('right-side-bar')
@include('discuss')
@endsection
