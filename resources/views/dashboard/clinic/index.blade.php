@extends('layouts.app')

@section('content')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>All Clinics</h2>
                <button class="btn btn-success add_service" style="">
                    <a href="{{route('dashboard.clinics.create')}}">Add Clinic</a>
                </button>
                @foreach($clinics as $clinic)


                <div class="d_flex_column card_service">
                    <h4>{{$clinic->name}}</h4>
                    <h4>{{$clinic->address}} {{$clinic->city}}</h4>
                    <h4> <i class="fas fa-phone"> </i> {{$clinic->phone_clinic}}</h4>

                    <button class="btn btn-dark">
                        <a href="{{route('dashboard.clinics.edit', $clinic->id)}}"> Edit
                            <i class="fas fa-edit"></i>
                        </a>
                    </button>

                    <form action="{{route('dashboard.clinics.destroy', $clinic->id)}}" method="post">
                        @METHOD('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                    </form>
                </div>



                @endforeach



            </div>


        </div>

    </div>

</div>



</div>


</div>
@endsection