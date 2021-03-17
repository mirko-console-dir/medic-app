@extends('layouts.app')

@section('content')

<div class="container d_flex" id="dashboard">

    @role('doctor')
    @include('dashboard.partials.sidebar')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>Add new clinic</h2>
                <form method="post" action="{{ route('dashboard.clinics.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group d_flex_column">

                        <!-- Name -->
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Insert clinic name" value="" required>
                        <br>


                        <!-- city -->
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Insert clinic city" value="">
                        <br>


                        <!-- price -->
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Insert clinic address" value="">
                        <br>


                        <!-- phone_clinic -->
                        <label for="phone_clinic">Phone clinic</label>
                        <input type="number" name="phone_clinic" id="phone_clinic" class="form-control" placeholder="Insert clinic phone number" value="">
                        <br>


                        <button type="submit" class="btn btn-success">Create</button>


                </form>


            </div>

        </div>

    </div>



</div>


@endrole



</div>

@endsection