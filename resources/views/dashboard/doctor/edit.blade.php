@extends('layouts.app')
@section('title')
Edit Profile
@endsection
@section('content')
<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('dashboard.doctors.update', $user->slug) }}" enctype="multipart/form-data">

            @METHOD('PATCH')
            @csrf


            <div class="form-group d_flex_column">

                <!-- Name -->
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Insert your name" value="{{$user->name}}" required>
                <br>


                <!-- address -->
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Insert your lastname" value="{{$user->lastname}}" required>
                <br>


                <!-- Email -->
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Insert your email" value="{{$user->email}}" required>
                <br>


                <!-- Register_number_doc -->
                <label for="register_number_doc">Register Doctor Number</label>
                <input type="number" name="register_number_doc" id="register doctor number" class="form-control" placeholder="Insert your register_number_doc" value="{{$user->register_number_doc}}" required>
                <br>

                <!-- Description -->
                <label for="body">Description</label>
                <textarea type="textarea" name="body" id="body" class="form-control" placeholder="Insert your body" rows="4" cols = "40">
                {{$user->body}}
                </textarea>
                <br>

                <!-- Address -->
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Insert your address" value="{{$user->address}}">
                <br>

                <!-- ManyToMany Service -->
                <label for="clinic_id">Clinics where you want to operate </label>
                <select name="clinic_id[]" id="" multiple>
                    @foreach($clinics as $clinic)
                    <option value="{{$clinic->id}}" name="clinic_id">
                        {{$clinic->name}}
                    </option>
                    @endforeach
                </select>
                <br>

                <!-- ManyToMany Specialization -->
                <label for="specialization_id">Specializations </label>
                <select name="specialization_id[]" id="" multiple>
                    @foreach($specializations as $specialization)
                    <option value="{{$specialization->id}}" name="specialization_id">
                        {{$specialization->name}}
                    </option>
                    @endforeach
                </select>
                <br>

                <!-- CV -->
                <label for="cv_img">Curriculum Vitae</label>
                <input type="file" name="cv_img" class="form-control-file">
                <small class="text-muted">Add your CV file</small>
                <br>

                <!-- Profile_img -->
                <label for="profile_img">Profile Image</label>
                <input type="file" name="profile_img" class="form-control-file">
                <small class="text-muted">Edit your Profile image</small>
                <br>

                <!-- Prefix FOREIGN KEY -->

                <label for="prefix_id">Country prefix</label>
                <select name="prefix_id" id="prefix_id">
                    @foreach($prefixes as $prefix)
                    <option value="{{$prefix->id}}" name="prefix_id">{{$prefix->name}} {{$prefix->dial_code}}</option>
                    @endforeach
                </select>
                <br>


                <!-- Phone_number -->
                <label for="phone_number">Phone Number</label>
                <input type="tel" name="phone_number" class="form-control" value="{{$user->phone_number}}">
                <br>

                <button type="submit" class="btn btn-success">Edit</button>


            </div>


        </form>



    </div>


</div>
@endsection