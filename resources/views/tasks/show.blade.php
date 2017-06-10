@extends('common.menu')

@section('inner-content')

    <h1 class="section-title">{{$task->title}}</h1>

    <p><strong>Start date: </strong>{{$task->startDate}}</p>
    <p><strong>Start time: </strong>{{$task->time}}</p>
    <p><strong>Priority: </strong>{{$task->priority}}</p>

    <a href="/tasks"> Tasks list </a>


@endsection