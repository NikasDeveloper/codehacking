@extends('layouts.admin')

@section('content')

    <h1>All Posts</h1>

    @if($posts)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Owner</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->photo->file}}" alt="Bullshit" height="50" width="50"></td>
                    <td><a href="{{route('admin.users.edit', $post->user->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category_id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


@endsection