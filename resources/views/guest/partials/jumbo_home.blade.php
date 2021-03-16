<header id="jumbo_home">
  <div class="overlay_doc_image">
    {{-- navbar --}}
    @include('layouts.guest.partials.navbar')

    <div class="container_searchbar">
      <form class="col-lg-6 d_flex" action="index.html" method="post">
        <input type="text" name="search" placeholder="Search for a doctor here">
        <button type="submit" name="button">GO</button>
      </form>
    </div>


  </div>
</header>
