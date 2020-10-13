<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div id="gtco-logo"><a href="{{url('/')}}">Gally <em>.</em></a></div>
            </div>
            <div class="col-xs-8 text-right menu-1">
                    <ul>
                        @foreach($data['menu'] as $menu)
                        <li><a href="{{url('/')}}{{$menu['url']}}">{{$menu['name']}}</a></li>
                        @endforeach
                        @if(Session::has('admin'))
                        <li class="btn-cta"><a href="{{url('/admin/users')}}"><span>admin</span></a></li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                         @endif
                        @if(Session::has('user'))
                            <li class="btn-cta"><a href="{{url('/user')}}"><span>user</span></a></li>
                            <li><a href="{{url('/logout')}}">Logout</a></li>
                        @endif
                    </ul>
            </div>

        </div>
    </div>
</nav>