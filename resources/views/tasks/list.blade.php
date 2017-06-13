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
    @foreach($tasksCollection as $tasksForDay)
        <div class="task-day-list">
            <p class="task-date">{{$tasksForDay[0]->startDate}}</p>
            <ul class="task-list">
                @foreach($tasksForDay as $task)
                    <li class="task-list-item task-priority-{{Illuminate\Support\Str::lower($task->priority)}}">
                        <a href="/tasks/{{$task->id}}">
                        {{$task->time}}
                        - <strong>{{$task->title}}</strong> for {{$task->duration}} hours.
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach


@endsection