<nav class="gtco-nav  navbar-dark bg-dark" role="navigation" style="background-image: url('{{asset("/")}}images/navbg.jpg'); background-position: right">
    <div class="gtco-container">
        <div class="row">
            <div class="col-sm-2 col-xs-12">
                <div id="gtco-logo"><a href="{{url('/')}}">Gally <em>.</em></a></div>
            </div>

            <div class="col-xs-10 text-right menu-1">
                <ul>
                    <li><a href="{{url('/admin/users')}}">Users</a></li>
                    <li><a href="{{url('/admin/contact')}}">Contact</a></li>
                    <li><a href="{{url('/admin/image')}}">Photos</a></li>
                    <li><a href="{{url('/admin/vote')}}">Votes</a></li>
                    <li><a href="{{url('/admin/questions')}}">Questions</a></li>
                    <li><a href="{{url('/admin/sub')}}">Subscribers</a></li>
                    <li><a href="{{url('/admin/nav')}}">User Navigation</a></li>
                    <li><a href="{{url('/admin/footer')}}">Footer</a></li>
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