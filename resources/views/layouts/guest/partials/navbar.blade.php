<ul id="navbar" class="d_flex">
  <li><a href="#">prova</a></li>
  <li><a href="#">prova</a></li>
  <li><a href="#">prova</a></li>
  <li><a href="#">prova</a></li>
  @if (Route::has('login'))
      @auth
      <li><a href="{{ url('/dashboard') }}">Home</a></li>
      @else
      <li><a href="{{ route('login') }}">Login</a></li>


      @if (Route::has('register'))
        <li><a href="{{ route('register') }}">Register</a></li>
      @endif
      @endauth
  @endif
</ul>
