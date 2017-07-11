@extends('layouts.master')

@section('content')

    <div class="sidebar" style="background-color:{{Auth::user()->sidebar_color}}">
        <div class="user-avatar">
            <img src="{{ asset(Auth::user()->photo)}}">


            <p class="username">{{Auth::user()->name}}</p>
        </div>

        <ul class="menu">
            @if(Auth::user()->isAdmin())
                <li><a href="/admin">Admin panel</a></li>
            @endif
            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
            <li><a href="{{url('/tasks')}}">Tasks</a></li>
            <li><a href="{{url('/settings')}}">Settings</a></li>
            <li><a href="{{url('/notes')}}">Notes</a></li>
            <li><a href="">Messages</a></li>
            @if(Auth::user()->isAdmin())
                <li><a href="">News</a></li>
            @endif
        </ul>
        <form action="/logout" method="post">
            {{csrf_field()}}
            <input type="submit" value="Wyloguj">
        </form>


    </div>


    <div class="content">
        @yield('inner-content')
    </div>




@endsection