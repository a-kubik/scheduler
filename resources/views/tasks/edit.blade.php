@extends('common.menu')



@section('inner-content')


    <ul>
        @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-container">
        <form action="/tasks/{{$task->id}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="two fields">
                <div class="form-group">
                    <label>Task name</label>
                    <input type="text" name="title" value="{{$task->title}}">
                </div>
                <div class="form-group">
                    <label>Priority</label>
                    <select name="priority">
                        <option value="1">Low</option>
                        <option value="2">Normal</option>
                        <option value="3">High</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Task description</label>
                <textarea name="description">{{$task->description}}</textarea>
            </div>

            <div class="fields">
                <div class="form-group">
                    <label>Start date</label>
                    <input id="datepicker" type="datetime" name="startDate" value="{{$task->startDate}}">
                </div>
                <div class="form-group">
                    <label>Start time</label>
                    <select name="time">
                        @for($i=1;$i<=24;$i++)
                            <option  @if($task->time == $i.":00") selected @endif value="{{$i}}:00">{{$i}}:00</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label>Duration</label>
                    <input type="number" name="duration" value="{{$task->duration}}">
                </div>
            </div>


            <div class="form-group">
                <input type="submit" value="Dodaj" class="btn btn-primary">
            </div>


    </div>



@endsection
