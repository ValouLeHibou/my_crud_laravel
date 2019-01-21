@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Content</td>
                <td>Autor</td>
                <td>Type</td>
                <td>Image_URL</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($shares as $share)
                <tr>
                    <td>{{$share->id}}</td>
                    <td>{{$share->title}}</td>
                    <td>{{$share->content}}</td>
                    <td>{{$share->autor}}</td>
                    <td>{{$share->genre}}</td>
                    <td><img src="{{$share->image_url}}"></td>
                    <td><a href="{{ route('articles.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('articles.destroy', $share->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
