@extends('layouts.admin')

@section('content')


    <h1>Edit Category</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($category,['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6" style="padding-left: 0px;">
                {!! Form::submit('Edit Post', [ 'class' => 'btn btn-primary pull-left']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}

            <div class="form-group col-sm-6" style="padding-right: 0px;">
                {!! Form::submit('Delete Post', [ 'class' => 'btn btn-danger pull-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection