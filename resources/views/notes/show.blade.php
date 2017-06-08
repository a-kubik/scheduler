@extends('common.menu')

@section('inner-content')

    <h1 class="section-title">{{$note->title}}</h1>

    <p>{{$note->content}}</p>

    <a href="/notes"> Notes list </a>


@endsection