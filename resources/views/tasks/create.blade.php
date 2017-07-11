@extends('common.menu')

@section('inner-content')


    <ul>
        @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
    </ul>
    <form action="/tasks" method="post">
        {{csrf_field()}}
        <div class="fields">
            <div class="form-group">
                <label>Task name</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option value="1">Zakupy</option>
                    <option value="2">Rozrywka</option>
                    <option value="3">Praca</option>
                </select>
            </div>
            <div class="form-group">
                <label>Priority</label>
                <select name="priority">
                    <option value="1">Low</option>
                    <option value="2" selected>Normal</option>
                    <option value="3">High</option>
                </select>
            </div>
        </div>
        <div class="fields">
            <div class="form-group">
                <label>Start date</label>
                <input id="datepicker" type="datetime" name="startDate"
                       value="{{\Carbon\Carbon::now()->toDateString()}}">
            </div>
            <div class="form-group">
                <label>Start time</label>
                <select name="time" value="{{\Carbon\Carbon::now()->hour}}">
                    @for($i=1;$i<=24;$i++)
                        <option value="{{$i}}:00" @if(\Carbon\Carbon::now()->hour+1 == $i) selected @endif>{{$i}}:00
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label>Duration <em>(hours)</em></label>
                <input type="number" name="duration" value="1">
            </div>
        </div>
        <div class="fields">
            <div class="form-group">
                <label>Task description</label>
                <textarea name="description"></textarea>
            </div>
        </div>


        <div class="form-group">
            <input type="submit" value="Dodaj" class="btn btn-primary">
        </div>


    </form>


@endsection
