@extends('layouts.master')

@section('content')


    <div class="welcome-form">
        <h1>Log in</h1>

        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                   autofocus>
            <label for="password" class="col-md-4 control-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif


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
