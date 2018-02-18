@extends('layouts.app')

@section('left-side-bar')
<div class="text-secondary" style="position:fixed;">
    <h2>Topics</h2>
    @foreach($topics as $topic)
    <ul class="list-unstyled">
        <li><a href="/?topic={{$topic['topic']}}" class="text-secondary" style="text-decoration:none">{{$topic['topic']}}</a></li>
    </ul>
    @endforeach
</div>
@endsection

@section('content')
    @foreach($posts as $post)
        @include('post.show')<br>
    @endforeach
@endsection

@section('right-side-bar')
@include('discuss')
@endsection