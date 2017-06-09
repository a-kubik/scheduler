@extends('common.menu')

@section('inner-content')

    <h1 class="section-title">{{$task->title}}</h1>

    <p>{{$task->startDate}}</p>

    <a href="/tasks"> Tasks list </a>


@endsection