@extends('layouts.app')
@section('title')
My Reviews
@endsection

@section('content')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>My Reviews</h2>

                @foreach($reviews as $review)


                @endforeach
            </div>

        </div>

    </div>



</div>

</div>
@endsection