<header id="jumbo_home">
    <div class="overlay" style="background-image: url({{asset('img/Medical.png')}})">
        {{-- navbar --}}
        @include('layouts.guest.partials.navbar')

        <div class="container_80">
            <div class="row h100">
              <div class="col-lg-12 d_flex searchbar h100">
                <form action="index.html" method="post" class="d_flex">
                  <input type="text" name="search" value="" placeholder="Search for doctors">
                  <button type="submit" name="button">GO</button>
                </form>
              </div>
        </div>
    </div>
  </header>
