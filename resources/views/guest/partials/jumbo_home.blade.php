<header id="jumbo_home">
  <div class="overlay_doc_image">
    {{-- navbar --}}
    @include('layouts.guest.partials.navbar')

    <div class="container_searchbar">

      <div class="col-lg-6 col-sm-12 text_jumbo">
        <h2>The best place to find doctors you need.</h2>
      </div>
        <searchome api="{{route('api.users')}}"></searchome>
    </div>

  </div>
</header>
