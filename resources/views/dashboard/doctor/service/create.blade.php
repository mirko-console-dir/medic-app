@extends('layouts.app')
@section('title')
  Add a Service
@endsection

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
                <h2>Create new service</h2>
                <form method="post" action="{{ route('dashboard.services.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group d_flex_column">

                        <!-- Name -->
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Insert your name" value="" required>
                        <br>


                        <!-- description -->
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Insert your description" value="" >
                        <br>


                        <!-- price -->
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Insert your price" value="" step="0.01">
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
