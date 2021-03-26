
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
        <img src="{{asset('storage/' . $user->profile_img)}}" alt="">
      </div>

      <div class="col-lg-8 col-md-12 info_container">
        <h1>{{$user->name}} {{$user->lastname}}</h4>
        <div class="info_work">


            {{-- @if($user_has_specialization = $user->specialization()->where('id', $user_specialization)->exists()) --}}

            @foreach ($specializations as $specialization)

              @if ($user->specializations()->where('id', $specialization->id)->exists())

                <h4>
                  Specialist in
                      {{$specialization->name}}
                </h4>

              @endif

          @endforeach









            <h4>
              Works at
              @foreach($user_clinic as $clinic)
              @if($clinic->id == $user->id)
              @foreach($clinic->clinics as $user_has_clinic)
              {{$user_has_clinic->name}}
              @endforeach
              @endif
              @endforeach

            </h4>
          </div>
        <p>BIO</p>
        <div class="description">
          <p>{{$user->body}}</p>
        </div>

        <p class="phone_number">
          Phone Number:
          @foreach($prefixes as $prefix)
          @if($user->prefix_id == $prefix->id)
          {{$prefix->dial_code}} {{$user->phone_number}}
          @endif
          @endforeach
        </p>

      </div>




    <!-- FORM MESSAGES -->

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
        <input type="number" name="vote" id="vote" class="form-control" placeholder="Insert your vote" min="0" max="5">
        <!-- Guest title -->
        <label for="title">Insert a title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Insert a title">
        <!-- Guest message -->
        <label for="body">Write your review here</label>
        <textarea name="body" id="body" cols="40" rows="4"></textarea>


        <button type="submit" class="btn btn-success">Send</button>



    </form>

  </div>

  </main>

</div>

@include('guest.partials.footer')

@endsection
