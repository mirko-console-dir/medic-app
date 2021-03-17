@extends('layouts.app')

@section('content')
@role('doctor')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')
    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>Profile information</h2>

                <div class="detail d_flex info">
                    @if($user->profile_img == '')
                    <img src="{{asset('img/user-default.jpg')}}" alt="">
                    @else
                    <img src="{{ asset('storage/' . $user->profile_img)}}" alt="">
                    @endif
                    <div class="d_flex_column">
                        <h4>Full Name: {{$user->name}} {{$user->lastname}}</h4>
                        <h4>Email: {{$user->email}}</h4>
                    </div>
                </div>
            </div>

            <div class="detail d_flex_column">
                <h2>Account information</h2>
                <h4>Address: {{$user->address}}</h4>
                <h4>Register Doctor Number: {{$user->register_number_doc}}</h4>
                <h4>Phone Number:
                    @foreach($prefixes as $prefix)
                    @if($user->prefix_id == $prefix->id)
                    {{$prefix->dial_code}} {{$user->phone_number}}
                    @endif
                    @endforeach

                </h4>
                <div class="d_flex_column">
                    <h4>Clinics where you operate:</h4>
                    @foreach($user_clinic as $clinic)
                    @if($clinic->id == $user->id)
                    @foreach($clinic->clinics as $user_has_clinic)
                    <h4>{{$user_has_clinic->name}}</h4>
                    @endforeach
                    @endif
                    @endforeach
                </div>
                <div class="d_flex_column">
                    <h4>Specializations:</h4>
                    @foreach($user_specialization as $specialization)
                    @if($specialization->id == $user->id)
                    @foreach($specialization->specializations as $user_has_specialization)
                    <h4>{{$user_has_specialization->name}}</h4>
                    @endforeach
                    @endif
                    @endforeach
                </div>


            </div>

            <div class="detail d_flex_column">
                <h2>Curriculum Vitae</h2>
                @if($user->cv_img == "")
                <h4>Curriculum Vitae not found</h4>
                @else
                <iframe src="{{asset('storage/' . $user->cv_img)}}" frameborder="0" width="500px" height="400px" allow="fullscreen" scroll="no"></iframe>
            </div>
            @endif


            <div class="crud d_flex">


                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy-{{ $user->slug }}"><i class="fas fa-trash"></i></button>
                {{-- Start Add Modal -  --}}
                <div class="modal fade" id="destroy-{{ $user->slug }}" tabindex="-1" role="dialog" aria-labelledby="post-destroy-{{ $user->slug }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="#destroy-{{ $user->slug }} title">Delete Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                &#x1F6A8; This action is IRREVERSIBLE. <br> Are you sure you want to delete this Profile?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('dashboard.doctors.destroy', $user->slug)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Add Model --}}

                <button class="btn btn-warning"><a href="{{route('dashboard.doctors.edit', $user->slug)}}"> <i class="fas fa-pencil-alt"></i></a></button>


            </div>

            <!-- ModalDelete Crud -->

        </div>





    </div>

</div>
@endrole








@role('admin')
<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="col-md-9">
        
        
    </div>
</div>
@endrole


@endsection