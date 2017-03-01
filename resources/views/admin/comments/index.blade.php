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
                    <th>Updated</th>
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
                    <td>{{$comment->updated_at}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        not found
    @endif

@endsection