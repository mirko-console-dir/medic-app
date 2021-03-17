@extends('layouts.app')

@section('content')

<div class="container d_flex" id="dashboard">

    @role('doctor')
    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>My Service</h2>

                @foreach($services as $service)

                @if($service->user_id == $user->id)
                <div class="d_flex_column card_service" style="justify-content: space-around;">
                    <h4>{{$service->name}}</h4>
                    <h4>{{$service->description}}</h4>
                    <h4>&euro; {{$service->price}}</h4>
                   
                    <button class="btn btn-dark">
                        <a href="{{route('dashboard.services.edit', $service->id)}}"> Edit
                            <i class="fas fa-edit"></i>
                        </a>
                    </button>

                    <form action="{{route('dashboard.services.destroy', $service->id)}}" method="post">
                        @METHOD('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                    </form>



                </div>




                @endif
                @endforeach

                <button class="btn btn-success add_service" style="">
                    <a href="{{route('dashboard.services.create')}}">Add Service</a>
                </button>
                <div class="d_flex_column">


                </div>


            </div>

        </div>

    </div>



</div>



@endrole
</div>
@endsection