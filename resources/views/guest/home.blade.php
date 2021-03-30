@extends('layouts.guest.app')

@section('title')
Home
@endsection


@section('content')
@include('guest.partials.jumbo_home')

<main>
  @include('guest.partials.boxes_features_home')

  @include('guest.partials.sponsored_doctors')

  {{-- @include('guest.partials.info_centre') --}}

</main>

@include('guest.partials.footer')
{{-- <style> with js plein --}}

@include('guest.partials.js.jumbo_home')

<cookie></cookie> 
@endsection
