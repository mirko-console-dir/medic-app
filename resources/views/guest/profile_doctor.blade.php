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
            </div>
          @else
            <h3 class="no_bio">Isn't there enough information on this doctor?
                <a href="#">Send a message</a>
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
                @if($user->prefix_id == $prefix->id && $user->phone_number !== 0)
                  Phone Number:  {{$prefix->dial_code}} {{$user->phone_number}}
                @endif
              @endforeach
            </p>
            <button type="button" name="button">
              Send a message to {{$user->name}} {{$user->lastname}}
            </button>
          </div>
        </div>

      </div>



    <!-- FORM MESSAGES -->
    <div class="row">


    <form method="post" action="{{ route('message.store', [ 'user_id' => $user->id]) }}" class="col-lg-6 form_message">
        <h2>Send a Message</h2>
        @csrf
        <!-- Guest name -->
        <label for="name">Insert Your name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Insert a name">

        <!-- Guest lastname -->
        <label for="lastname">Insert Your lastname</label>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Insert your lastname">

        <!-- Guest email -->
        <label for="name">Insert Your email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Insert your email">
        <!-- Guest title -->
        <label for="title">Insert a title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Insert a title">
        <!-- Guest message -->
        <label for="body">Write your message here</label>
        <textarea name="body" id="body" cols="40" rows="4"></textarea>


        <button type="submit" class="btn btn-success">Send</button>

    </form>



    <!-- FORM REVIEWS -->

    <form method="post" action="{{ route('review.store', [ 'user_id' => $user->id]) }}" class="col-lg-6 form_review">
      <h2>Write a Review</h2>
        @csrf
        <!-- Guest name -->
        <label for="name">Insert your name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Insert a name">

        <!-- Guest lastname -->
        <label for="lastname">Insert your lastname</label>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Insert your lastname">

        <!-- Guest vote -->
        <label for="vote">Insert vote</label>
        <input type="number" name="vote" id="vote" class="form-control" placeholder="Insert your vote" min="1" max="5">
        <!-- Guest title -->
        <label for="title">Insert a title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Insert a title">
        <!-- Guest message -->
        <label for="body">Write your review here</label>
        <textarea name="body" id="body" cols="40" rows="4"></textarea>


        <button type="submit" class="btn btn-success">Send</button>


    </form>
  </div>

  </div>

  </main>

</div>

@include('guest.partials.footer')

<script type="application/javascript">

var scrollPosition = document.getElementById('services_pagination').scrollTop;

function goUpServices(){
  document.getElementById('services_pagination').scrollTo({
    top: scrollPosition - 200,
    behavior: 'smooth'
  });
}

function goDownServices(){
      document.getElementById('services_pagination').scrollTo({
        top: scrollPosition + 200,
        behavior: 'smooth'
      });
}

</script>

@endsection
