<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    // dd(Post::all());
    $posts = Post::all()->map(fn ($post) => [
        'title' => $post->title,
        'body' => $post->body,
        'author_name' => $post->user->name,
        'id' => $post->id
    ]);
    return Inertia::render('Home', [
        'posts' => $posts
    ]);
})->middleware(['auth', 'verified'])->name('home');

// Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');
// Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
// Route::delete('posts/{post}', [PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');

Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
