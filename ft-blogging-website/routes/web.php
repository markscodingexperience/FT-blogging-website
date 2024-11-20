<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $posts = Post::latest()->with('user')->paginate(5);
    return view('dashboard', ['posts' => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/create', function () {
    return view('posts.create');
})->middleware(['auth'])->name('posts.create');

Route::post('/dashboard/store', function (Request $request) {

    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'content' => 'required',
    ]);

    Post::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'content' => $validated['content'],
        'user_id' => Auth::id(), 
    ]);

    return redirect()->route('dashboard')->with('status', 'Post created successfully!');
})->middleware(['auth'])->name('posts.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

});

require __DIR__.'/auth.php';
