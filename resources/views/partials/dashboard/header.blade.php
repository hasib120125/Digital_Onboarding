<header class="main-header">

    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <img src="{{asset('assets/images/logo-red.png')}}" width="130px" height="40px">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini logo-Robi"><b>Robi</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg logo-Robi"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Change Password</a></li>
                <li class="divider"></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>
                      Log Off
                  </a>
                </li>
              </ul>
            </li>
        </ul>
      </div>
    </nav>
</header>
