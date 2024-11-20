<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Your Posts</h3>
                    <a href="{{ route('posts.create') }}" class="text-blue-500">Create a New Post</a>
                    <!-- Loop through posts and display them -->
                    @foreach ($posts as $post)
                        <div class="mb-4 p-4 border border-gray-300 rounded">
                            <h4 class="font-bold text-lg">{{ $post->title }}</h4>
                            <p class="text-gray-700">{{ $post->description }}</p>
                            <small class="text-gray-500">
                                Created by: <strong>{{ $post->user->name }}</strong>
                            </small><br>
                            <small class="text-gray-500">
                                Created at: {{ $post->created_at->format('F d, Y') }}
                            </small>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>