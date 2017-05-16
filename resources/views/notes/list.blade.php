@extends('common.dashboard')

@section('inner-content')

    <h1 class="section-title">My notes</h1>

    <div class="tools-container">
        <ul class="tools">
            <li><a href="{{url('/notes/create')}}" class="btn primaryAction">Add note</a></li>
            <li><a href="{{url('/notes/create')}}" class="btn"></a></li>
            <li>
            </li>
        </ul>
    </div>
    <table class="table table-clickable">
        <caption>Notes</caption>
        <tr>
            <th>Title</th>
            <th>Created</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($notes as $note)
            <tr>
                <td>{{$note->title}}</td>
                <td>{{$note->created_at}}</td>
                <td><a href="/notes/{{$note->id}}/edit">Edit</a></td>
                <td><a href="#">Delete</a></td>
            </tr>
        @endforeach
    </table>

@endsection