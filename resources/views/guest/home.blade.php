@extends('layouts.guest.app')

@section('title')
Home
@endsection


@section('content')
@include('guest.partials.jumbo_home')

<main>
  @include('guest.partials.boxes_features_home')

</main>

@endsection
