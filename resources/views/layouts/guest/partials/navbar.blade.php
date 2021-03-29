<div id="navbar">
  <div class="container-fluid">

  <div class="row">

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 logo_container">

      <a href="/" class="d_flex" id="logo">
        <img src="{{asset('img/logo.png')}}" alt="MedicUs logo">
        <h1 class="title">MedicUs</h1>
      </a>
    </div>

    <div class="col-lg-9" id="links_container">

      <ul class="links">
        <li class="link">

          <a href="{{route('home')}}">
            <i class="fas fa-caret-right"></i>
            Home
            <div class="hr">
              <hr>
            </div>
          </a>
        </li>

        <li class="link">
          <a href="{{route('search')}}">
            <i class="fas fa-caret-right"></i>
            Search
            <div class="hr">
              <hr>
            </div>
          </a>
        </li>

        <li class="link">
          <a href="#">
            <i class="fas fa-caret-right"></i>
            link
            <div class="hr">
              <hr>
            </div>
          </a>
        </li>

        @if (Route::has('login'))
          @auth
            <li>
              <a href="{{ url('/dashboard') }}" class="button_nav btn_blue">My Profile</a>
            </li>
          @else
            <li>
              <a href="{{ route('login') }}" class="button_nav btn_blue">Login</a>
            </li>

            @if (Route::has('register'))
              <li>
                <a href="{{ route('register') }}" class="button_nav btn_white">Register</a>
              </li>
            @endif
          @endauth
        @endif
      </ul>
      <div class="close_icon_hamburger" onclick="closeHamburger()">
        <i class="fas fa-times"></i>
      </div>
    </div>

    <div class="offset-md-7 offset-sm-5">

    </div>

    <div id="button_hamburger" onclick = "openHamburger()" class="col-md-1">
      <i class="fas fa-bars"></i>
    </div>


  </div>
</div>
</div>
