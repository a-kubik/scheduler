@extends('common.dashboard')



@section('inner-content')


    <ul>
        @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-container">
        <form action="/notes" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <label>Note title</label>
                <input type="text" name="title">
            </div>

            <div class="form-group">
                <label>Note content</label>
                <textarea name="content"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Dodaj" class="btn btn-primary">
            </div>
        </form>

    </div>



@endsection
