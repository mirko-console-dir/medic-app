@extends('layouts.guest.app')

@section('title')
Advanced Search
@endsection


@section('content')
@include('layouts.guest.partials.navbar')
<advanced_search></advanced_search>
@include('guest.partials.footer')

@endsection
