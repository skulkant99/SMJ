<nav class="navbar header-navbar  pcoded-header" >
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#">
               {{-- <img class="img-fluid" src="{{URL::asset('bootstrap4/assets/images/logo.png')}}" alt="Theme-Logo" /> --}}
               <img src="{{asset('assets/images/favicon.ico')}}" whidth="100%">   Backoffice SMJ
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            {{-- <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul> --}}
            <ul class="nav-right">
                
                <li class="user-profile header-notification">
                    <a href="#!">
                        {{-- <img src="{{URL::asset('bootstrap4/assets/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">					
							{{ Auth::user()->name }} <!-- name user login --> --}}
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        
                        <li>
                            <a href="{{url ('Logout')}}">
                            <i class="ti-layout-sidebar-left"></i> Logout
                        </a>
                        <!-- <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>