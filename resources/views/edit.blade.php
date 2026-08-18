@extends('layout')

@section('content')
    <h1>EditPost</h1>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($error-all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('update', $post) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{$post -> title}}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content">Content:</label>
            <textarea id="content" name="content" class="form-control" rows="5" required>{{$post -> content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit Post</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Back to Posts</a>
    </form>
@endsection