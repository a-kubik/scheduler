@extends('common.menu')

@section('inner-content')

    <h1 class="section-title">My tasks</h1>

    <div class="tools-container">
        <ul class="tools">
            <li><a href="{{url('/tasks/create')}}" class="btn primaryAction">Add task</a></li>
            <li><a href="{{url('/tasks/create')}}" class="btn"></a></li>
            <li>
            </li>
        </ul>
    </div>
    <table class="table table-clickable">
        <caption>Tasks</caption>
        <tr>
            <th>Title</th>
            <th></th>
            <th>Start date</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td><a href="tasks/{{$task->id}}">{{$task->title}}</a></td>
                <td>{{$task->duration}}</td>
                <td>{{$task->startDate}}</td>
                <td><a href="/tasks/{{$task->id}}/edit">Edit</a></td>
                <td>
                    <form action="/task/{{$task->id}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    </form>
                    <a href="/tasks/{{$task->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection