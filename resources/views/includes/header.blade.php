<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize  minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
        <ul class="nav navbar-top-links navbar-right">
                         @if (!Auth::guest())
       
          <li>
            <div class="text-muted welcome-message">
              <a ui-sref="main.profile" class="ng-binding"><span class="user-img"><img src="{{url('img/default-user-icon-profile.png')}}" alt=""></span> Hi {{ Auth::user()->name }}</a>
            </div>
          </li>
          <li>
             
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
          </li>
          @endif
        </ul>

    </nav>
</div>
