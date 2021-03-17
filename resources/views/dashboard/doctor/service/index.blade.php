@extends('layouts.app')

@section('content')

<div class="container d_flex" id="dashboard">

    @role('doctor')
    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>My Service</h2>

                @foreach($services as $service)

                @if($service->user_id == $user->id)
                <div class="d_flex service" style="justify-content: space-around;">
                    <h4>{{$service->name}}</h4>
                    <h4>{{$service->description}}</h4>
                    <h4>&euro; {{$service->price}}</h4>

                </div>

                @endif
                @endforeach

                <button class="btn btn-success" style="">
                    <a href="{{route('dashboard.services.create')}}">Add Service</a>
                </button>
                <div class="d_flex_column">


                </div>


            </div>

        </div>

    </div>



</div>



@endrole
</div>
@endsection