@extends('common.menu')

@section('inner-content')

    <h1 class="section-title">{{$note->title}}</h1>

    <div class="article">
        <div class="article-info-container">
            <span class="article-created">Created at: {{$note->created_at}}</span>
            <span class="article-updated">Updated at: {{$note->updated_at}}</span>
        </div>
        <p class="article-content">
            {{$note->content}}
        </p>
    </div>

    <a href="/notes"> Notes list </a>


@endsection