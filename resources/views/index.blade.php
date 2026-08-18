@extends('layout')

@section('content')
    <h1>All Posts</h1>
    <p>This is the home page of the CRUD application.</p>
    <a href="{{ route('create') }}" class="btn btn-primary mb-3">+ Create New Post</a>
    @if($posts->count())
        @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">

    <h5>{{ $post->title }}</h5>
    <p>{{ Str::limit($post->content),100 }}</p>
    <a href="{{route('show',$post)}}" class="btn btn-sm btn-info">View</a>
    <a href="{{route('edit',$post)}}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{route('delete',$post)}}" method="POST" style="display: inline-block;"
        onsubmit="return confirm('คุณแน่ใจหรอว่าจะลบโพสต์นี้ ?')";">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
</div>

        </div>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection