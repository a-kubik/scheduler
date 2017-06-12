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
        @foreach($tasksCollection as $tasksForDay)
            <p>{{$tasksForDay[0]->startDate}}</p>
            <ul>
                @foreach($tasksForDay as $task)
                    <li>{{$task->title}} -- Godzina rozpoczecia:{{$task->time}}</li>
                @endforeach
            </ul>
        @endforeach
    </table>

@endsection