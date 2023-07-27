@extends('layouts.guest.app')

@section('title')
API Doctors
@endsection

<main>
  API Doctors
  <div id="app">
    <doctors_api></doctors_api>
  </div>

</main>

@include('guest.partials.footer')


