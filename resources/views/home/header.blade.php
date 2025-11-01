  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ Auth::check() ? url('/home') : url('/') }}" class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ Auth::check() ? url('/home') : url('/') }}" class="{{ request()->is('/') || request()->is('home') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{url('explore')}}" class="{{ request()->is('explore') ? 'active' : '' }}">Explore </a></li>
                        <li><a href="#categories" class="{{ request()->is('categories') ? 'active' : '' }}">Categories </a></li>

                      @if (Route::has('login'))
                      
                          @auth
                            <li>
                                <a href="{{ url('book_history') }}" class="{{ request()->is('book_history') ? 'active' : '' }}">My History</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                          @else
                              <li><a href="{{ route('login') }}" class="{{ request()->is('login') ? 'active' : '' }}">Log in</a></li>

                              @if (Route::has('register'))
                                  <li><a href="{{ route('register') }}" class="{{ request()->is('register') ? 'active' : '' }}">Register</a></li>
                              @endif
                          @endauth

                      @endif

                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
