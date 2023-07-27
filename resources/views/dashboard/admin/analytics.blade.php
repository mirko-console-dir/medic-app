@extends('layouts.app')
@section('title')
Analytics
@endsection

@section('script')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>Website Analytics</h2>
                @role('admin')
                <h4>Registered doctors: {{$tot_doctors_n - 1}}</h4>
                <canvas id="adminNumberDoctors"></canvas>

                <h4>Sponsorships incomes by month</h4>
                <canvas id="adminSponsorship"></canvas>
                @include('dashboard.admin.partials.js_analytics')
                @endrole

                @role('doctor')

                <h4>Messages per months
                </h4>
                <canvas id="doctorMessage"></canvas>
                <h4>Reviews per months
                </h4>
                <canvas id="doctorReview"></canvas>
                <h4>Reviews by votes &star;
                </h4>
                <canvas id="doctorVote"></canvas>

                @include('dashboard.doctor.analytics.js_analytics')

                @endrole





            </div>

        </div>

    </div>



</div>

</div>

@endsection