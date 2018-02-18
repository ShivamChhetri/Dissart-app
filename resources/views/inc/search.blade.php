@extends('layouts.app')

@section('left-side-bar')
    <h2 class="text-secondary">Related Articles</h2>
    <ul class="list-unstyled">
    @foreach($related as $relatable)
        @foreach($posts as $post)
            @if($post->id != $relatable->id)
            <li><a href="/search/{{$relatable->title}}">{{$relatable->title}}</a></li>
            @endif
        @endforeach
    @endforeach
    </ul>
@endsection

@section('content')
    @foreach($posts as $post)
        @include('post.show')
    @endforeach
@endsection


@section('right-side-bar')
@include('discuss')
@endsection