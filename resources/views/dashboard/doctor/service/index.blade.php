@extends('layouts.app')

@section('content')

<div class="container d_flex" id="dashboard">

    @role('doctor')
    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>My Service</h2>

                <div class="d_flex_column">

                    @foreach($user_service as $service)

                    @if($service->id == $user->id)

                    @foreach($service->services as $user_has_service)
                    <div class="d_flex service">
                    
                        <h4>{{$user_has_service->name}}: </h4>
                        <h4>$ {{$user_has_service->price}}.00</h4>


                    </div>

                    @endforeach
                    @endif

                    @endforeach
                </div>

            </div>

        </div>



    </div>



    @endrole
</div>
@endsection