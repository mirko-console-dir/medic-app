@extends('layouts.guest.app')

@section('title')
Advanced Search
@endsection

<div id="advanced_search">

@section('content')
@include('layouts.guest.partials.navbar')
<main>
  <div class="container_80 row">

    <h1 class="title col-lg-12">Advanced Search </h1>
    <advanced_search></advanced_search>

  </div>


</main>


@include('guest.partials.footer')

</div>
@endsection
