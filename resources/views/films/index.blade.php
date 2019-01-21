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
                <td>Director</td>
                <td>Productor</td>
                <td>Genre</td>
                <td>Synopsis</td>
                <td>Image_URL</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($shares as $share)
                <tr>
                    <td>{{$share->id}}</td>
                    <td>{{$share->title}}</td>
                    <td>{{$share->director}}</td>
                    <td>{{$share->productor}}</td>
                    <td>{{$share->genre}}</td>
                    <td>{{$share->synopsis}}</td>
                    <td><img src="{{$share->image_url}}"></td>
                    <td><a href="{{ route('films.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('films.destroy', $share->id)}}" method="post">
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
