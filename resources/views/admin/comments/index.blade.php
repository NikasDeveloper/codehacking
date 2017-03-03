@extends('layouts.admin')


@section('content')

    <h1>All Comments</h1>

    @if(count($comments) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Post</th>
                    <th>Author</th>
                    <th>Body</th>
                    <th>Is Active</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>
                        <a href="{{route('home.post', $comment->post->id)}}">
                            <img src="{{$comment->post->photo->file}}" class="img-responsive img-rounded" width="70px">
                        </a>
                    </td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->is_active}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        @if($comment->is_active == 'ACTIVE')

                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Unapprove', [ 'class' => 'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', [ 'class' => 'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('DELETE', [ 'class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        not found
    @endif

@endsection