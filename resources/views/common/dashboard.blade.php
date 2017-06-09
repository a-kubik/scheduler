@extends('common.menu')

@section('inner-content')
    <div class="dashboard-news-container">
        <div class="dashboard-news-block">
            <p> Recent notes</p>
            <ul class="dashboard-list">
                @foreach($notes as $note)
                    <li><a href="/notes/{{$note->id}}/show"> {{$note->title}}</a></li>
                @endforeach

            </ul>
        </div>
        <div class="dashboard-news-block">
            <p> Upcoming tasks</p>
            <ul class="dashboard-list">
                {{-- @for ($i = 0; $i < 14; $i++)
                     <li><a href="#"> Task {{$i}}</a></li>
                 @endfor--}}

            </ul>

        </div>
        <div class="dashboard-news-block">
            <p> Recent messages</p>
            <ul class="dashboard-list">
                {{--   @for ($i = 0; $i < 24; $i++)
                       <li><a href="#"> Message {{$i}}</a></li>
                   @endfor--}}

            </ul>
        </div>
    </div>

@endsection
