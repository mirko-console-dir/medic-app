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
                <canvas id="adminNumberDoctors"></canvas>

                <canvas id="adminSponsorship"></canvas>


                @include('dashboard.admin.partials.js_analytics')
                @endrole





            </div>

        </div>

    </div>



</div>

</div>

@endsection