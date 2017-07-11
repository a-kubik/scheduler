@extends('layouts.master')

@section('content')

    <div class="navbar">
        <h1>Scheduler</h1>
        <span>Your time. Our duty.</span>
        @if(Lang::getLocale() == 'en')
            <a href="locale/pl"> PL </a>
        @elseif(Lang::getLocale() == 'pl')
            <a href="locale/en"> EN </a>
        @endif
    </div>
    <div class="welcome-form">
        <h2> {{ __('messages.register-title') }} <span class="additional-register-title">{{ __('messages.register-additional-register-title') }}</span>!</h2>
        <form action="{{url('register')}}" method="post" novalidate>
            {{csrf_field()}}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="email">{{ __('messages.register-email') }}</label>
                <input type="email" name="email" id="email">
            </div>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="name">{{ __('messages.register-name') }}</label>
                <input type="text" name="name" id="name" value="{{old('name')}}">
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="password">{{ __('messages.register-password') }} </label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">{{ __('messages.register-password_confirmation') }} </label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <button class="btn btn-primary" type="submit">{{ __('messages.register-submit') }}</button>
            <p>{{ __('messages.register-already-have-account') }} <a href="{{url('login')}}">{{ __('messages.register-sign-in-link') }}</a></p>
        </form>
    </div>

@endsection
