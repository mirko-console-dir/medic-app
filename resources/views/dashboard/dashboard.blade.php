@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @role('doctor')

        @include('dashboard.partials.sidebar')
        <div class="col-md-9">
            <div class="my_profile d_flex_column">
                <div class="detail d_flex" style="justify-content: space-between; align-items: center;">
                    <h3>Hi {{$user->name}} {{$user->lastname}}!</h3>
                    <a href="{{route('dashboard.doctors.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="detail d_flex" style="justify-content: space-between; align-items: center;">
                    <h3>{{$user->email}}</h3>
                    <a href="{{route('dashboard.doctors.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="detail d_flex" style="justify-content: space-between; align-items: center;">
                    <h3>{{$user->address}}</h3>
                    <a href="{{route('dashboard.doctors.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="detail d_flex" style="justify-content: space-between; align-items: center;">
                    <h3>{{$user->register_number_doc}}</h3>
                    <a href="{{route('dashboard.doctors.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="detail d_flex" style="justify-content: space-between; align-items: center;">
                    <h3>{{$user->cv_img}}</h3>
                    <a href="{{route('dashboard.doctors.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="detail d_flex" style="justify-content: space-between; align-items: center;">
                    <h3>{{$user->profile_img}}</h3>
                    <a href="{{route('dashboard.doctors.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="detail d_flex" style="justify-content: space-between; align-items: center;">
                    <h3>{{$user->phone_number}}</h3>
                    <a href="{{route('dashboard.doctors.edit', $user->id)}}"><i class="fas fa-pen"></i></a>
                </div>
            </div>

        </div>
        @endrole








        @role('admin')
        <div class="col-md-3">
            <ul class="list-unstyled">
                <li><a href="">Doctors</a></li>
                <li><a href="">Clinics</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Sponsorships</a></li>
                <li><a href="">Specializations</a></li>
                <li><a href="">Messages</a></li>
                <li><a href="">Reviews</a></li>
                <li><a href="">Analytics</a></li>

            </ul>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
        @endrole

    </div>
</div>
@endsection