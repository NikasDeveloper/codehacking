@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if($photos)

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img src="{{$photo->file}}" alt="bybis kiausai" height="50px" width="50px"></td>
                <td>{{$photo->created_at}}</td>
                <td>{{$photo->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @endif

@endsection