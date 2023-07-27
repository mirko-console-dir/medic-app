@extends('layouts.app')
@section('title')
My Services
@endsection

@section('content')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>My Service</h2>

                @foreach($services as $service)

                @if($service->user_id == $user->id)
                <div class="d_flex_column card_service">
                    <h4>{{$service->name}}</h4>
                    <h4>{{$service->description}}</h4>
                    <h4>&euro; {{$service->price}}</h4>

              
                    <div class="d_flex buttons">

                        <button class="btn btn-dark edit_button">
                            <a href="{{route('dashboard.services.edit', $service->id)}}"> Edit
                                <i class="fas fa-edit"></i>
                            </a>
                        </button>

                        <form action="{{route('dashboard.services.destroy', $service->id)}}" method="post">
                            @METHOD('DELETE')
                            @csrf
                            <button class="btn btn-danger delete_button" type="submit"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                        </form>


                    </div>


                </div>




                @endif
                @endforeach

                @role('doctor')
                <button class="btn btn-success add_service" style="">
                    <a href="{{route('dashboard.services.create')}}">Add Service</a>
                </button>
                @endrole

            </div>

        </div>

    </div>



</div>

</div>
@endsection