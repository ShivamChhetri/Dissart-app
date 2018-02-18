@extends('layouts.app')

@section('content')
<h1>Create Article</h1>
<br>

@include('inc/errors')

<form method='POST' action='/post'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name='title' class="form-control">
    </div>
    <div>
        <label>Topic</label>
        <select name="topic">
            <option style="display:none"disabled selected value>
                --Select a Topic--
            </option>
            <option>Economics</option>
            <option>Indian Politics</option>
            <option>Geo Politics</option>
            <option>World History</option>
            <option>Indian History</option>
            <option>Technology</option>
            <option>Entertainment</option>
            <option>Miscellaneous</option>
        </select>
    </div>
    <br>
    <div class="form-group">
        <label>Content</label>
        <textarea type="text" name='content' id='article-ckeditor' class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-info">Publish</button>
</form>
    
@endsection