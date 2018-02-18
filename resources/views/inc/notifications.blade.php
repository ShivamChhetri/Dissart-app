<li class="nav-item dropdown">
    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
        {{--  <notify userid="{{auth()->id()}}" unread="{{auth()->user()->unreadnotifications->count()}}"></notify>  --}}
        
        <i class="fa fa-bell"></i>
        @if(auth()->user()->unreadnotifications->count())
            <span class="badge badge-danger">
                {{auth()->user()->unreadnotifications->count()}}
            </span> 
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right" 
         style="max-height:400px;overflow-y:scroll;"  
         aria-labelledby="navbarDropdown">
        
        <div class="dropdown-item text-secondary">
            @if(auth()->user()->notifications->count())
                <a href="/markread"><input type="checkbox"></a>
                <span>Mark all as read</span>
            @else
            <span>No Notifications</span>
            @endif
        </div>
        
        @foreach (auth()->user()->unreadnotifications as $notification)
            <div class="dropdown-item alert alert-danger">
                <a href="/profile/{{$notification->data['sender']}}"><strong>{{$notification->data['sender']}}</strong></a>
                <a href="/markread/{{$notification->id}}/{{$notification->data['data']['post_id']}}">
                    commented on your article:<br><strong>{{$notification->data['data']['comment']}}</strong></a>
            </div>
        @endforeach
        @foreach (auth()->user()->readnotifications as $notification)
            <div class="dropdown-item text-danger">
                <a href="/profile/{{$notification->data['sender']}}"><strong>{{$notification->data['sender']}}</strong></a>
                <a href="/markread/{{$notification->id}}/{{$notification->data['data']['post_id']}}">
                    commented on your article:<br><strong>{{$notification->data['data']['comment']}}</strong></a>
            </div>
        @endforeach
    </div>
</li>