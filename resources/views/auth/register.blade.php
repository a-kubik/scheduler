@extends('layouts.master')

@section('content')
    <div class="welcome-form">
        <h1> Register and have fun!</h1>
        <form action="{{url('register')}}" method="post">
            {{csrf_field()}}
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
            Email <input type="email" name="email">
            Name <input type="text" name="name">
            Password <input type="password" name="password">
            <button class="btn btn-primary" type="submit">Register</button>
            <p>Already have an account? <a href="{{url('login')}}">Sign in!</a></p>
        </form>
    </div>

@endsection
