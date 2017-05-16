@extends('layouts.master')

@section('content')

    <div class="sidebar">
        <div class="user-avatar">
            <img src="/avatar.jpg">
            <p class="username">Bellissima Antonia</p>
        </div>

        <ul class="menu">
            {{--@if(Auth::user()->isAdmin())
                <li><a href="/admin">Admin panel</a></li>
            @endif--}}
            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
            <li><a href="{{url('/tasks')}}">Tasks</a></li>
            <li><a href="{{url('/settings')}}">Settings</a></li>
            <li><a href="{{url('/notes')}}">Notes</a></li>
            <li><a href="">Messages</a></li>
            <li><a href="">News</a></li>
        </ul>


    </div>


    <div class="content">
        @yield('inner-content')
    </div>




@endsection