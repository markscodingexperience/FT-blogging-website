@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    @if($posts->count())
        @foreach ($posts as $post)
            <div class="mb-4 border-b pb-2">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <small>By: {{ $post->user->name ?? 'Unknown' }} | Created on: {{ $post->created_at }}</small>
            </div>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif
</div>
@endsection