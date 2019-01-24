<div class="header-wrap">
    <nav class="header-navbar">
        <div class="nav-wrapper">
            <a href="{{route('user-dashboard')}}" class="brand-logo"><img src="{{asset('assets/images/logo-red.png')}}" alt="" /></a>
            <!-- nav for desktop -->
            <ul class="main-nav hide-on-med-and-down">
                <li><a href="{{route('user-dashboard')}}">Dashboard</a></li>
                <!-- <li><a href="{{route('user-guide-line')}}">Guideline</a></li> -->
                <li><a href="{{route('user-guide-line-and-other-info')}}">Guideline & Other Information</a></li>
                <li><a href="{{route('about-us')}}">We Are</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
            </ul>
            <!-- nav for tab/mobile -->
            <ul id="nav-mobile" class="sidenav">
                <li class="active"><a href="{{route('user-dashboard')}}">Dashboard</a></li>
                <!-- <li><a href="{{route('user-guide-line')}}">Guideline</a></li> -->
                <li><a href="{{route('user-guide-line-and-other-info')}}">Guideline & Other Information</a></li>
                <li><a href="{{route('about-us')}}">We Are</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
            </ul>

            <div class="header-right-nav">
                <a class="dropdown-trigger" href="#" data-target="dropdown1"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color: #C42B32;
                    font-size: 46px;"></i></a>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="{{route('user-profile-edit',$profile->id)}}">{{$profile->name}}</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>	
    </nav>
</div>