@extends('common.menu')



@section('inner-content')

    <div class="form-container">
        <form action="/notes" method="post">
            {{csrf_field()}}

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label>Note title</label>
                <input type="text" name="title">
            </div>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label>Note content</label>
                <textarea name="content"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
        </form>

    </div>



@endsection
