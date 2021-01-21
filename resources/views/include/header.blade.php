        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    IP BANNER
                </a>
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('welcome')}}">
                            Welcome
                        </a>
                    </li>
                </ul>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }} </a>
                            </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }} </a>
                                </li>
                                @endif
                                @else

                                <li class="nav-item">
                                    <a href="{{ route('dashboard')}}" class="nav-link">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('create')}}" class="nav-link">
                                        <i class="fa fa-map-marker"></i> Get IP </a>
                                </li>
                                
                            
                                <li class="nav-item">
                                    <a href="{{ route('index')}}" class="nav-link">
                                        <i class="fa fa-bar-chart"></i> Visitors </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('uploaded_baners')}}" class="nav-link">
                                        <i class="fa fa-bar-chart"></i> Baners </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('banner')}}" class="nav-link">
                                        <i class="fa fa-cloud-upload"></i> Upload Banner </a>
                                </li>



                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>
                                    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>