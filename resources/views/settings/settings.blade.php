@extends('common.menu')

@section('inner-content')

    <h2 class="section-title">Settings</h2>

    <div class="form-container thinner">
        <form action="/settings" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PUT">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            @if ($errors->has('photo'))
                <span class="help-block">
                    <strong>{{ $errors->first('photo') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label>Photo <em> max 2048kB</em></label>
                <input type="file" name="photo">
            </div>
            @if ($errors->has('sidebar_color'))
                <span class="help-block">
                    <strong>{{ $errors->first('sidebar_color') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label for="sidebar-color">Sidebar color</label>
                <input id="sidebar-color" type="color" name="sidebar_color" class="sidebar-color-picker"
                       value="{{Auth::user()->sidebar_color}}">
                <button class="btn default-color-btn">Default color</button>
            </div>


            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>

    </div>



@endsection