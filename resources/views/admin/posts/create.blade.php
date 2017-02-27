@extends('layouts.admin')

@section('content')

    <h1>Create Post</h1>

    @include('includes.form_error')

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Name:') !!}
        {!! Form::textArea('body', null, ['class' => 'form-control', 'rows' => 3, 'style' => 'resize:vertical;']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Name:') !!}
        {!! Form::select('category_id', [ 1 => 'Category 1', 2 => 'Category 2',] , 1, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', ['class' => 'form-control-file']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', [ 'class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection