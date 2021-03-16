@extends('layouts.guest.app')

@section('title')
Home
@endsection


@section('content')
@include('guest.partials.jumbo_home')

<main>
  @include('guest.partials.boxes_features_home')

  @include('guest.partials.sponsored_doctors')

</main>

@include('guest.partials.footer')

@endsection
