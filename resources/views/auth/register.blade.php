@extends('layouts.master')

@section('content')

    <div class="navbar">
        <h1>Scheduler</h1>
        <span>Your time. Our duty.</span>
    </div>
    <div class="welcome-form">
        <h2> Register <span class="additional-register-title">and have fun!</span></h2>
        <form action="{{url('register')}}" method="post" novalidate>
            {{csrf_field()}}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{old('name')}}">
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="rp">Repeat password </label>
                <input type="password" name="rp" id="rp">
            </div>
            <button class="btn btn-primary" type="submit">Register</button>
            <p>Already have an account? <a href="{{url('login')}}">Sign in!</a></p>
        </form>
    </div>

@endsection
