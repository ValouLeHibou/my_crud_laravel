@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Share
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
            <form method="post" action="{{ route('films.update', $share->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value={{ $share->title }} />
                </div>
                <div class="form-group">
                    <label for="director">Director :</label>
                    <input type="text" class="form-control" name="director" value={{ $share->director }} />
                </div>
                <div class="form-group">
                    <label for="productor">Productor :</label>
                    <input type="text" class="form-control" name="productor" value={{ $share->productor }} />
                </div>
                <div class="form-group">
                    <label for="genre">Genre :</label>
                    <input type="text" class="form-control" name="genre" value={{ $share->genre }} />
                </div>
                <div class="form-group">
                    <label for="synospis">Synopsis :</label>
                    <input type="text" class="form-control" name="synopsis" value={{ $share->synopsis }} />
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL :</label>
                    <input type="text" class="form-control" name="image_url" value={{ $share->image_url }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
