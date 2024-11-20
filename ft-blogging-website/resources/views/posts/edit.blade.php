@extends('layouts.app')

@section('content')
<div>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $post->title }}" required>
        <label>Description:</label>
        <textarea name="description" required>{{ $post->description }}</textarea>
        <label>Content:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>
        <button type="submit">Update</button>
    </form>
</div>
@endsection