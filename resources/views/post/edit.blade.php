@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <br>

    @include('inc/errors')

    <form method='POST' action='/post/{{$post->id}}'>
        {{ method_field('PATCH') }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name='title' value="{{$post->title}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea type="text"name='content' id="article-ckeditor" class="form-control">{!!$post->content!!}</textarea>
        </div>

        <button type="submit" class="btn btn-info">Update</button>    
    </form>   
@endsection

 