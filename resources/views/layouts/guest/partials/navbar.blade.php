<div id="navbar" class="">
  <div class="row">

    <div class="col-lg-3">

      <a href="/" class="d_flex" id="logo">
        <img src="{{asset('img/logo.png')}}" alt="MedicUs logo">
        <h1 class="title">MedicUs</h1>
      </a>
    </div>

    <div class="col-lg-6">

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

      </ul>
    </div>

    <div class="col-lg-3 d_flex buttons">
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}" class="btn_blue">My Profile</a>
        @else
          <a href="{{ route('login') }}" class="btn_blue">Login</a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn_white">Register</a>
          @endif
        @endauth
      @endif
    </div>

  </div>
</div>
