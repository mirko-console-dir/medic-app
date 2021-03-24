@extends('layouts.app')

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
                $timeleft = date_diff($date1,$date2)->format("%a");
                ?>
                @endforeach
                @endif
                @endforeach
                <br>



                @if($now > $end_sponsorship)
                <h3>You are not subscribed</h3>


                <!-- <form action="{{ route('dashboard.sponsorships.update', $user->slug) }}" method="post"> -->
                <form action="{{ route('dashboard.checkout.update', $sponsorship->id) }}" method="post">
                    @METHOD('PATCH')
                    @csrf
                    <select name="sponsorship_id" id="">
                        @foreach($sponsorships as $key => $sponsorship)
                        @if ($key > 0)
                        <option value="{{$sponsorship->id}}" name="sponsorship_id">
                            {{$sponsorship->name}} &euro; {{$sponsorship->price}}
                        </option>
                        @endif
                        @endforeach

                    </select>


                    <button type="submit" class="btn btn-success">Go to Checkout</button>

                </form>
                
                @else
                <h3><span>This is your sponsorship:</span> <span class="active_sponsorship">{{$sponsorship->name}}</span></h3>
                <br>
                <h3><span>Expiration date:</span> <span class="active_sponsorship">{{date('d-m-Y', strtotime($end_sponsorship))}}</span></h3>
                @endif

                @if ($timeleft == 1)
                    <small>{{$timeleft}} day left</small>
                @else
                    <small>{{$timeleft}} days left</small>
                @endif
                @endrole


            </div>


        </div>

    </div>

</div>



</div>


</div>
@endsection