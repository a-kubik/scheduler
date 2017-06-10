@extends('layouts.master')

@section('content')

    <div class="navbar">
        <h1>Scheduler</h1>
        <span>Your time. Our duty.</span>
    </div>

    <div class="welcome-form">
        <h2>Log in</h2>

        <form role="form" method="POST" action="{{ url('/login') }}" novalidate>
            {{ csrf_field() }}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                       autofocus>
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>



            <button type="submit" class="btn btn-primary">
                Login
            </button>


            <p>No account yet? <a href="{{url('register')}}">Register!</a></p>

            {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
            {{--Forgot Your Password?--}}
            {{--</a>--}}

        </form>
    </div>

@endsection
