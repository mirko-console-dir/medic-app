@extends('layouts.guest.app')


@section('title')

@endsection


@section('content')
@include('layouts.guest.partials.navbar')

<h4>{{$user->name}}</h4>
<h4>{{$user->lastname}}</h4>
<h4>{{$user->address}}</h4>
<h4>{{$user->body}}</h4>

<form method="post" action="{{ route('message.store', [ 'user_id' => $user->id]) }}">
    @csrf
    <!-- Guest name -->
    <label for="name">Insert Your name</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Insert a name">

    <!-- Guest lastname -->
    <label for="lastname">Insert Your lastname</label>
    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Insert your lastname">

    <!-- Guest email -->
    <label for="name">Insert Your email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Insert your email">
    <!-- Guest title -->
    <label for="title">Insert a title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Insert a title">
    <!-- Guest message -->
    <label for="body">Write your message here</label>
    <textarea name="body" id="body" cols="40" rows="4"></textarea>


    <button type="submit" class="btn btn-success">Send</button>



</form>





@include('guest.partials.footer')

@endsection