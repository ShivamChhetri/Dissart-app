<ul class="list-group">
    <li class="list-group-item">
        <h6 class="text-secondary">Topic:{{$post->topic}}</h6>
        <h1>{{$post->title}}</h1>
        <img src="/profile_pic/{{$post->user->profilepic}}" alt="#"
        style="height:25px;width:25px;border-radius:15px;"><i>{{$post->user->name}}</i>
        <p class="text-secondary"style="margin-left:35px;">{{$post->created_at->diffForHumans()}}</p>
        <p>{!!$post->content!!}</p>

        {{--  buttons  --}}
        <div style="display:flex;" class="float-right">
            @if(auth()->id()==$post->user_id)
            <a href="/post/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                
            <form method="POST" action="/post/{{$post->id}}" >
                {{ method_field('DELETE') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="Submit" class="btn btn-default">Delete</button>
            </form>
            @endif
            <like postid="{{$post->id}}"></like>
        </div>
       
            
        <div>@include('comment/add')</div>
       
    </li>
</ul>