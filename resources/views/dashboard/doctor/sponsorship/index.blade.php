@extends('layouts.app')
@section('title')
    Sponsorship
@endsection
@section('content')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column" id="sponsorship">
                <h2>Sponsorship</h2>

                @role('doctor')

                @foreach($user_sponsorships as $user_sponsorship)
                @if($user_sponsorship->id == $user->id)
                @foreach($user_sponsorship->sponsorships as $sponsorship)

                <?php
                // dd($sponsorship);
                $duration = (string)$sponsorship->duration;
                // echo($duration);
                $start_date = (string)$sponsorship->pivot->created_at;
                // dd($start_date);
                // echo ($start_date);
                $now = date('Y-m-d H:i:s');
                // echo($now);
                $end_sponsorship =
                    date('Y-m-d H:i:s', strtotime("+$duration hours", strtotime($start_date)));
                // echo($end_sponsorship);

                // echo($end_sponsorship);

                //Function days left
                $date1=date_create($end_sponsorship);
                $date2=date_create($now);
                $timeleft = date_diff($date1,$date2)->format("%a")+1;
                ?>
                @endforeach
                @endif
                @endforeach
                <br>



                @if($now > $end_sponsorship)
                <h3>You are not subscribed</h3>


                <!-- <form action="{{ route('dashboard.sponsorships.update', $user->slug) }}" method="post"> -->
                <form action="{{ route('dashboard.checkout.update', $sponsorship->id) }}" class="form_sponsorship" method="post">
                    @METHOD('PATCH')
                    @csrf
                    <select name="sponsorship_id" class="select_sponsorship">
                        @foreach($sponsorships as $key => $sponsorship)
                        @if ($key > 0)
                        <option value="{{$sponsorship->id}}" name="sponsorship_id">
                            {{$sponsorship->name}} &euro; {{$sponsorship->price}} ({{$sponsorship->duration}} hours)
                        </option>
                        @endif
                        @endforeach

                    </select>


                    <button type="submit" class="btn"><i class="fas fa-shopping-cart"></i> Checkout</button>
                    <small class="text-muted">Choose a Subcription</small>
                    <small class="text-muted">**Sponsorship allows you to showcase your profile and make it appear at the top in searches by users</small>

                </form>
                
                @else
                <h3><span>This is your sponsorship:</span> <span class="active_sponsorship">{{$sponsorship->name}}</span></h3>
                <br>
                <h3><span>Expiration date:</span> <span class="active_sponsorship">{{date('d-m-Y', strtotime($end_sponsorship))}}</span></h3>
                    {{-- Function timeleft --}}
                    @if ($timeleft == 1)
                        <small class="days_left">{{$timeleft}} day left</small>
                    @else
                        <small class="days_left">{{$timeleft}} days left</small>
                    @endif
                @endif

                
                @endrole


            </div>


        </div>

    </div>

</div>



</div>


</div>
@endsection