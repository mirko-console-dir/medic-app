<div id="navbar" class="container_80">
  <div class="row">

    <div class="col-lg-3">
      <a href="#" class="d_flex_center">
        <img src="{{asset('img/logo.png')}}" alt="logo brutto" id="logo">
      </a>
    </div>

    <div class="col-lg-6">
      <ul class="d_flex links">
        <li><a href="#">prova</a></li>
        <li><a href="#">prova</a></li>
        <li><a href="#">prova</a></li>
      </ul>
    </div>

    <div class="col-lg-3 d_flex buttons">
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}" class="button">My Profile</a>
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
