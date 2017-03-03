@extends('layouts.blog-post')

@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="{{route('admin.users.edit', $post->user->id)}}">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at}}</p>

    <hr>

    <!-- Preview Image -->
    <img style="width:50%; margin-left:25%" class="img-responsive img-rounded" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(Auth::check())

        <div class="well">
            <h4>Leave a Comment:</h4>

            {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="form-group">
                {!! Form::textArea('body', null, ['class' => 'form-control', 'rows' => 3, 'style' => 'resize:vertical;']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Post Comment', [ 'class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

    </div>

    @endif

    <hr>

    <!-- Posted Comments -->
    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{$comment->photo}}" class="img-rounded" height="64" width="64">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at}}</small>
                    </h4>
                    <p>{{$comment->body}}</p>

                @foreach($comment->replies as $reply)

                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at}}</small>
                            </h4>
                            <p>{{$reply->body}}</p>
                        </div>
                        {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}

                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                        <div class="form-group">
                            {!! Form::textArea('body', null, [
                                'class' => 'form-control',
                                'rows'  => 1,
                                'style' => 'resize:vertical; margin-top:15px;',
                                'placeholder' => 'Your reply',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Submit', [ 'class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <!-- End Nested Comment -->
                @endforeach

                </div>
            </div>
        @endforeach
    @endif

@endsection