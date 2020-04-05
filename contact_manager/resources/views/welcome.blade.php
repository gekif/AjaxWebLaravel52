@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="jumbotron text-center">
                <h1>Free Online Contact Manager</h1>

                <p class="lead">
                    Organize your contact freely and easily
                </p>
                @if (Auth::guest())
                    <p>
                        <a href="{{ url('/register') }}" class="btn btn-primary btn-lg">Sign Up</a> Or
                        <a href="{{ url('/login') }}" class="btn btn-default btn-lg">Sign In</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
