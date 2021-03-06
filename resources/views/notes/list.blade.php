@extends('common.menu')

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
    @if(count($notes) > 0)
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
                <td><a href="notes/{{$note->id}}">{{$note->title}}</a></td>
                <td>{{$note->created_at}}</td>
                <td><a href="/notes/{{$note->id}}/edit">Edit</a></td>
                <td>
                    <form action="/notes/{{$note->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    </form>
                    <a class="deleteBtn" href="#">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif

@endsection