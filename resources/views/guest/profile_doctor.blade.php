@extends('layouts.guest.app')

@section('title')
  {{$user->name}} {{$user->lastname}}
@endsection

@section('content')
<div id="profile_doctor">
@include('layouts.guest.partials.navbar')

  <main  class="container_80">
    <div class="doctor_infos row">

      <div class="col-lg-4 col-md-12 img_profile_container">
        @if ($user->profile_img == null)
          <div class="img_null" style="background-image: url({{asset('img/user-default.jpg')}})">
          </div>

        @else
          <div class="img_container" style="background-image: url({{asset('storage/' . $user->profile_img)}})">
          </div>
        @endif
      </div>

      <div class="col-lg-8 col-md-12 info_container">
        <h1>{{$user->name}} {{$user->lastname}}</h4>
        <div class="info_personal">

{{-- Stampa delle specializzazioni se esistono --}}
          <h4 class="specializations">
          @foreach ($specializations as $specialization)
              @if ($user->specializations()->where('id', $specialization->id)->exists())
                <span>{{$specialization->name}}</span>
              @endif
          @endforeach
          </h4>

{{-- Stampa delle cliniche se esistono --}}
          <h4 class="clinics">
          @foreach ($clinics as $clinic)
              @if ($user->clinics()->where('id', $clinic->id)->exists())
                <span>{{$clinic->name}}</span>
              @endif
          @endforeach
          </h4>

{{-- Stampa della descrizione se esiste --}}
          @if ($user->body !== null)
            <div class="bio">
              <h4>About this Doctor</h4>
              <div class="description">
                <p>{{$user->body}}</p>
              </div>
              @if ($user->cv_img !== null)
                <a href="{{asset('storage/' . $user->cv_img)}}" download>Download CV</a>
              @endif
            </div>
          @else
            <h3 class="no_bio">Isn't there enough information on this doctor?
                <a onclick="appearMessage()">Send a message</a>
              </h3>
          @endif

        </div>
      </div>

      <div class="services_contacts row">

{{-- Sezione con i servizi offerti dal dottore --}}

        {{-- Codice in php che filtra trova i servizi del dottore e li inserisce in un array --}}
        @php
          $services_list = [];
        foreach ($services as $service){
          if($service->user_id == $user->id){
            $services_list[] = $service;
          }
        }
        @endphp

          @if (count($services_list)>0)

          <div class="services col-lg-6 row">
            <h2 class="col-lg-12">Offered Services</h2>
            <div class="services_container d_flex col-lg-12">
              {{-- Bottoni per scorrere tra i servizi rapidamente --}}
              <div class="buttons">
                <div class="btn_up_doctor" onclick="goUpServices()">
                  <i class="fas fa-chevron-up"></i>
                </div>

                <div class="btn_down_doctor" onclick="goDownServices()">
                  <i class="fas fa-chevron-down"></i>
                </div>
              </div>

              <div id="services_pagination" class="d_flex">

                @foreach ($services_list as $service)
                  <div class="service">
                    <h4>{{$service->name}}</h4>
                    <p>{{$service->description}}</p>
                    <p class="price">Price: {{$service->price}}</p>
                  </div>
                @endforeach
              </div>

            </div>
          </div>
        @endif

{{-- Sezione con i dati di contatto del medico --}}
        <div class="contacts col-lg-6">
          <h2>Contacts</h2>
          <div class="info_contact">
            <p>Email: {{$user->email}}</p>
            <p class="phone_number">
              @foreach($prefixes as $prefix)
                @if($user->prefix_id == $prefix->id && $user->phone_number !== null)
                  Phone Number:  {{$prefix->dial_code}} {{$user->phone_number}}
                @endif
              @endforeach
            </p>
            <button type="button" name="button" onclick="appearMessage()">
              Message to {{$user->name}} {{$user->lastname}}
            </button>
          </div>
        </div>

      </div>

    </div>

  </main>

  {{-- Codice in php che sarà utile nel corso della pagina --}}
  @php

    // Foreach che trova le recensioni del dottore e le inserisce in un array
    $reviews_list = [];
    foreach ($reviews as $review){
      if($review->user_id == $user->id){
        $reviews_list[] = $review;
      }
    }

    // Ciclo for che pusha in un array i voti
    $reviews_vote = [];
    foreach ($reviews_list as $rev) {
      $reviews_vote[] = $rev->vote;
    }

    // Funzione che somma i voti ricevuti dall'utente
    $votes_sum = array_sum($reviews_vote);

    // Funzione che trova la media dei voti arrotondata per l'utente
    if (count($reviews_vote) > 0) {
      $average_votes = round($votes_sum/count($reviews_vote));
    }

  @endphp

  @if (count($reviews_list)>0)
    {{-- Box delle recensioni --}}
    <div id="reviews_box" class="container_80">
      <div class="pagination">

        <h2 class="title_reviews_section">Reviews for {{$user->name}} {{$user->lastname}}
        </h2>

        <p class="stars_title">@for ($i=0; $i < $average_votes; $i++)
          <i class="fas fa-star"></i>
        @endfor
        @for ($i=0; $i < (5-$average_votes); $i++)
          <i class="far fa-star"></i>
        @endfor | average rating of {{count($reviews_vote)}} reviews</p>

        <div class="tableList d_flex_column" id="listingTable"></div>
        <div class="pagination-block">
          <span class="pageButton outline-none hidden" id="button_prev">
            {{-- <i class="fas fa-chevron-left"></i> --}}
          </span>
          <span id="page_number" class="outline-none"></span>
          <span class="pageButton outline-none hidden" id="button_next">
            {{-- <i class="fas fa-chevron-right"></i> --}}
          </span>
        </div>
        <button type="button" name="button" onclick="appearReview()">
          Write a review
        </button>
      </div>
    </div>
  @else
    <div id="reviews_box" class="container_80">
      <div class="pagination">
        <h2 class="title_reviews_section">There is no review for {{$user->name}} {{$user->lastname}}</h2>
        <button type="button" name="button" onclick="appearReview()">
          Write a review
        </button>
      </div>
    </div>
  @endif

  <div class="forms">
{{-- Form per messages --}}
    <div id="form_message">
      <form method="post" action="{{ route('message.store', [ 'user_id' => $user->id]) }}">
          <h2>Message to {{$user->name}} {{$user->lastname}}</h2>
          @csrf
          <!-- Guest name -->
          <label for="name">name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Your name here">

          <!-- Guest lastname -->
          <label for="lastname">lastname</label>
          <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Your lastname here">

          <!-- Guest email -->
          <label for="name">email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
          <!-- Guest title -->
          <label for="title">title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Title for your message">
          <!-- Guest message -->
          <label for="body">Write your message</label>
          <textarea name="body" id="body" cols="40" rows="4" placeholder="Ask for something to this doctor"></textarea>


          <button type="submit">Send this Message</button>

      </form>
    </div>

{{-- Form for reviews --}}
    <div id="form_review">

      <form method="post" action="{{ route('review.store', [ 'user_id' => $user->id]) }}">
        <h2>Review about {{$user->name}} {{$user->lastname}}</h2>
          @csrf
          <!-- Guest name -->
          <label for="name">name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Your name here">

          <!-- Guest lastname -->
          <label for="lastname">lastname</label>
          <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Your lastname here">

          <!-- Guest vote -->
          <label for="vote">vote</label>
          <input type="number" name="vote" id="vote" class="form-control" placeholder="Vote from 1 to 5" min="1" max="5">
          <!-- Guest title -->
          <label for="title">title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Title for your review">
          <!-- Guest message -->
          <label for="body">Write your review</label>
          <textarea name="body" id="body" cols="40" rows="4" placeholder="Tell about your experience with this doctor"></textarea>


          <button type="submit">Post this Review</button>

      </form>

    </div>
  </div>

  @include('guest.partials.footer')

  @include('guest.partials.js.profile_doctor')
</div>

@endsection
