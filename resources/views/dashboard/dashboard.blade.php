@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @role('admin')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        @endrole
        @role('doctor')
        <p>diocane la madonna 8 ore per capire na cazzata</p>
        @endrole

    </div>
</div>
@endsection