<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommunityNewsController;
use App\Http\Controllers\ShowAll;
use App\Http\Controllers\PrototypeController;


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

Route::get('/', function () {
    return view('pages.index');
})->name('pages.index');

// Newsletter
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/send-newsletter', [NewsletterController::class, 'showNewsletterForm'])->name('newsletter.form');
Route::post('/send-newsletter', [NewsletterController::class, 'sendNewsletter'])->name('newsletter.send');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Polls
Route::prefix('poll')->middleware('auth')->group(function() {
    Route::view('create', 'polls.create')->name('poll.create');
    Route::post('create', [PollController::class, 'store'])->name('poll.store');
    Route::get('/', [PollController::class,'index'])->name('poll.index');
    Route::get('/update/{poll}', [PollController::class,'edit'])->name('poll.edit');
    Route::put('/update/{poll}', [PollController::class,'update'])->name('poll.update');
    Route::get('delete/{poll}',[PollController::class,'delete'])->name('poll.delete');

    Route::get('/{poll}', [PollController::class,'show'])->name('poll.show');
    Route::post('/{poll}/vote', [PollController::class,'vote'])->name('poll.vote');
});

// Upload Posts
Route::get('/posts/create', [PostsController::class, 'create'])->name('post.create');
Route::post('/posts', [PostsController::class, 'store'])->name('post.store');

// Upload News
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

// Upload Community News
Route::get('/community/news/create', [CommunityNewsController::class, 'create'])->name('community.create');
Route::post('/community/news', [CommunityNewsController::class, 'store'])->name('community.store');

// Show based off of ID
Route::get('/post/{id}', [PostsController::class, 'show'])->name('post.show');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/community/news/{id}', [CommunityNewsController::class, 'show'])->name('community.show');

//
Route::get('/prototype', [PrototypeController::class, 'index'])->name('prototype.index');
