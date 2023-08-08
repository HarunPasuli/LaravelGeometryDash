<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommunityNewsController;
use App\Http\Controllers\PrototypeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LevelGuesserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/posts/create', [PostsController::class, 'create'])->name('post.create');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('/level-guesser/create', [LevelGuesserController::class, 'create'])->name('level-guesser.create');
    Route::get('/send-newsletter', [NewsletterController::class, 'showNewsletterForm'])->name('newsletter.form');
    Route::post('/send-newsletter', [NewsletterController::class, 'sendNewsletter'])->name('newsletter.send');
    Route::get('/community/news/create', [CommunityNewsController::class, 'create'])->name('community.create');
});

Route::prefix('poll')->middleware(['auth', AdminMiddleware::class])->group(function() {
    Route::view('create', 'polls.create')->name('poll.create');
    Route::post('create', [PollController::class, 'store'])->name('poll.store');
    Route::get('/update/{poll}', [PollController::class,'edit'])->name('poll.edit');
    Route::put('/update/{poll}', [PollController::class,'update'])->name('poll.update');
    Route::get('delete/{poll}',[PollController::class,'delete'])->name('poll.delete');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/send-newsletter', [NewsletterController::class, 'showNewsletterForm'])->name('newsletter.form');
Route::post('/send-newsletter', [NewsletterController::class, 'sendNewsletter'])->name('newsletter.send');

Route::get('/', function () {
    return view('pages.index');
})->name('pages.index');

// Pages
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/community/news', [CommunityController::class, 'index'])->name('community.news');
Route::get('/posts',[PostsController::class, 'index'])->name('posts.index');

// Newsletter
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Polls
Route::get('/poll', [PollController::class,'index'])->name('poll.index');
Route::get('/{poll}', [PollController::class,'show'])->name('poll.show');
Route::post('/{poll}/vote', [PollController::class,'vote'])->name('poll.vote');

// Upload Posts
Route::post('/posts', [PostsController::class, 'store'])->name('post.store');

// Upload News
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

// Upload Community News
Route::post('/community/news', [CommunityNewsController::class, 'store'])->name('community.store');

// Show based off of ID
Route::get('/post/{id}', [PostsController::class, 'show'])->name('post.show');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/community/news/{id}', [CommunityNewsController::class, 'show'])->name('community.show');

// Comments
Route::post('/comments', [CommentController::class, 'storeComment'])->name('comments.store');
Route::post('/replies', [CommentController::class, 'storeReply'])->name('replies.store');

// Level guesser
Route::get('/level-guesser/{id}', [LevelGuesserController::class, 'show'])->name('level-guesser.show');
Route::post('/level-guesser', [LevelGuesserController::class, 'store'])->name('level-guesser.store');
