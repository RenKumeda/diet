<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\followPostController;
use App\Http\Controllers\commentPostController;
use App\Http\Controllers\mealPostController;
use App\Http\Controllers\postPostController;
use App\Http\Controllers\sleepPostController;
use App\Http\Controllers\trainingPostController;
use App\Http\Controllers\userPostController;
use App\Http\Controllers\weightPostController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //comment投稿保存のルーティング
    Route::post('/comments/{post}', [commentPostController::class, 'store']);
    
    //follow関連のルーティング
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/follow/{followerId}', [followPostController::class, 'store']);
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/follow/{followerId}/destroy', [followPostController::class, 'destroy']);
    });
    
    //likeに関するルーティング
    Route::post('/like/{postId}', [likePostController::class, 'store']);
    Route::post('/unliike/{postId}', [LikePostController::class, 'destoroy']);
    
    //meal投稿関連のルーティング
    Route::get('/meals', [mealPostController::class, 'index'])->name('Meal.index');
    Route::post('/meals', [mealPostController::class, 'store']);
    Route::get('/meal/create', [mealPostController::class, 'create'])->name('Meal.create');
    Route::get('/meals/{meal}', [mealPostController::class, 'show'])->name('Meal.show');
    Route::delete('/Meal/{meal}', [mealPostController::class,'destroy']);

  //post投稿関連のルーティング
    Route::get('/posts', [postPostController::class, 'index'])->name('Post.index');
    Route::post('/posts', [postPostController::class, 'store']);
    Route::get('/post/create', [postPostController::class, 'create'])->name('Post.create');
    Route::get('/posts/{post}', [postPostController::class, 'show'])->name('Post.show');
    Route::delete('/Post/{post}', [postPostController::class,'destroy']);

    //sleep投稿関連のルーティング
    Route::get('/sleeps', [sleepPostController::class, 'index'])->name('Sleep.index');
    Route::post('/sleeps', [sleepPostController::class, 'store']);
    Route::get('/sleep/create', [sleepPostController::class, 'create'])->name('Sleep.create');
    Route::get('/sleeps/{sleep}', [sleepPostController::class, 'show'])->name('Sleep.show');
    Route::delete('/Sleep/{sleep}', [sleepPostController::class,'destroy']);

    //training投稿関連のルーティング
    Route::get('/trainings', [trainingPostController::class, 'index'])->name('Training.index');
    Route::post('/trainings', [trainingPostController::class, 'store']);
    Route::get('/training/create', [trainingPostController::class, 'create'])->name('Training.create');
    Route::get('/trainings/{training}', [trainingPostController::class, 'show'])->name('Training.show');
    Route::delete('/Training/{training}', [trainingPostController::class,'destroy']);

    //userの一覧ページを表示するルーティング
    Route::get('/users', [userPostController::class, 'index']);

    //weight投稿関連のルーティング
    Route::get('/weights', [weightPostController::class, 'index'])->name('Weight.index');
    Route::post('/weights', [weightPostController::class, 'store']);
    Route::get('/weight/create', [weightPostController::class, 'create'])->name('Weight.create');
    Route::get('/weights/{weight}', [weightPostController::class, 'show'])->name('Weight.show');
    Route::delete('/Weight/{weight}', [weightPostController::class,'destroy']);
});

require __DIR__.'/auth.php';
