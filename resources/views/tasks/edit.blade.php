@extends('common.menu')



@section('inner-content')


    <ul>
        @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-container">
        <form action="/tasks/{{$task->id}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label>Note title</label>
                <input type="text" name="title" value="{{$task->title}}">
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" name="startDate" value="{{$task->startDate}}">
            </div>

            <div class="form-group">
                <input type="submit" value="Zapisz" class="btn btn-primary">
            </div>
        </form>

    </div>



@endsection
