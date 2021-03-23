@extends('layouts.app')

@section('content')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>Sponsorship</h2>


                <h3>Your subscription is:</h3>

             
                @foreach($user_sponsorships as $user_sponsorship)
                @if($user_sponsorship->id == $user->id)
                @foreach($user_sponsorship->sponsorships as $sponsorship)
                {{$sponsorship->name}}
                {{$sponsorship->duration}} hours
                @endforeach
                @endif
                @endforeach
                <br>

                <!-- <form action="{{ route('dashboard.sponsorships.update', $user->slug) }}" method="post"> -->
                <form action="{{ route('dashboard.checkout.update', $sponsorship->id) }}" method="post">
                @METHOD('PATCH')
                    @csrf
                    <select name="sponsorship_id" id="">
                        @foreach($sponsorships as $sponsorship)

                        <option value="{{$sponsorship->id}}" name="sponsorship_id">
                            {{$sponsorship->name}} &euro; {{$sponsorship->price}}
                        </option>
                        @endforeach

                    </select>
                    <button type="submit" class="btn btn-success">Go to Checkout</button>

                </form>
            </div>


        </div>

    </div>

</div>



</div>


</div>
@endsection