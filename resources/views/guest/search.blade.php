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
        <advanced_search api="{{route('api.users')}}"></advanced_search>
      </div>
      {{-- card display --}}
      {{-- <div class="container_80">
        <div class="card_container d_flex">
          <div class="card_wrapper">
            <a href="#" class="card">
              <div class="avatar"></div>
              <h4 class="name">Dott.ssa Cippa lippa</h4>
              <h4 class="specialization">Neurologia</h4>
              <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod reiciendis nulla fuga corporis, dolorem dignissimos quae quisquam aperiam sint nisi.</p>
              <div class="rating">*****</div>
            </a>
          </div>
        </div>
      </div> --}}

    </main>
    
  </div>
  
  @include('guest.partials.footer')
  @endsection