@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Share
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('articles.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="title">Title :</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="content">Content :</label>
                    <input type="text" class="form-control" name="content"/>
                </div>
                <div class="form-group">
                    <label for="autor">Autor :</label>
                    <input type="text" class="form-control" name="autor"/>
                </div>
                <div class="form-group">
                    <label for="type">Type :</label>
                    <input type="text" class="form-control" name="type"/>
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL :</label>
                    <input type="text" class="form-control" name="image_url"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
