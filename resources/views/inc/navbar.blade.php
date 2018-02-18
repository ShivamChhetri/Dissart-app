<nav class="navbar navbar-expand-md navbar-light fixed-top"
     style="background:#5bc0de;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"
               style="color:#fff;">
                <h3>{{ config('app.name', 'Dissart') }}</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav mr-auto" style="padding-left:35px;">
                    {{--  search-bar  --}}
                    {{--  search-bar  --}}
                    <li><search></search></li> 
                </ul>
        
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else

                        {{-- Add post --}}
                        {{-- Add post --}}
                        <li><a href="/post/create"
                               class="nav-link btn btn-default btn-sm" 
                               style="background:#ccc;margin-right:90px;margin-top:5px;">
                               Add Article
                            </a>
                        </li> 

                        {{--  notification  --}}
                        {{--  notification  --}}
                        @include('inc.notifications')
                        
                        
                        {{--  profile pic  --}}
                        {{--  profile pic  --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/profile_pic/{{Auth::user()->profilepic}}" alt="#"
                                style="height:32px;width:32px;border-radius:16px;">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                <a href="/profile/{{auth()->user()->name}}" class="dropdown-item">Profile</a>   
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        
                    @endguest
                </ul><!--navbar-right-->
            </div><!--collapse navbar-collapse-->
        </div><!--container-->
    </nav>
   
