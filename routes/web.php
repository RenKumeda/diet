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
    //follow解除関連のルーティング
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/follow/{followerId}/destroy', [followPostController::class, 'destroy']);
    });
    //meal投稿関連のルーティング
    Route::get('/meals', [mealPostController::class, 'index'])->name('Meal.index');
    //meal投稿保存のルーティング
    Route::post('/meals', [mealPostController::class, 'store']);
    //meal投稿作成画面を表示するルーティング
    Route::get('/meal/create', [mealPostController::class, 'create'])->name('Meal.create');
    //meal投稿の詳細画面を表示するルーティング
    Route::get('/meals/{meal}', [mealPostController::class, 'show'])->name('Meal.show');
    //meal投稿の削除を行うルーティング
    Route::delete('/Meal/{meal}', [mealPostController::class,'destroy']);
    //post投稿関連のルーティング
    Route::get('/posts', [postPostController::class, 'index'])->name('Post.index');
    //post投稿保存のルーティング
    Route::post('/posts', [postPostController::class, 'store']);
    //post投稿作成画面を表示するルーティング
    Route::get('/post/create', [postPostController::class, 'create'])->name('Post.create');
    //post投稿の詳細画面を表示するルーティング
    Route::get('/posts/{post}', [postPostController::class, 'show'])->name('Post.show');
     //post投稿の削除を行うルーティング
    Route::delete('/Post/{post}', [postPostController::class,'destroy']);
    //sleep投稿関連のルーティング
    Route::get('/sleeps', [sleepPostController::class, 'index'])->name('Sleep.index');
    //sleep投稿保存のルーティング
    Route::post('/sleeps', [sleepPostController::class, 'store']);
    //sleep投稿作成画面を表示するルーティング
    Route::get('/sleep/create', [sleepPostController::class, 'create'])->name('Sleep.create');
    //sleep投稿の詳細画面を表示するルーティング
    Route::get('/sleeps/{sleep}', [sleepPostController::class, 'show'])->name('Sleep.show');
    //sleep投稿の削除を行うルーティング
    Route::delete('/Sleep/{sleep}', [sleepPostController::class,'destroy']);
    //training投稿関連のルーティング
    Route::get('/trainings', [trainingPostController::class, 'index'])->name('Training.index');
    //training投稿保存のルーティング
    Route::post('/trainings', [trainingPostController::class, 'store']);
    //ttraining投稿作成画面を表示するルーティング
    Route::get('/training/create', [trainingPostController::class, 'create'])->name('Training.create');
    //training投稿の詳細画面を表示するルーティング
    Route::get('/trainings/{training}', [trainingPostController::class, 'show'])->name('Training.show');
    //training投稿の削除を行うルーティング
    Route::delete('/Training/{training}', [trainingPostController::class,'destroy']);
    //userの一覧ページを表示するルーティング
    Route::get('/users', [userPostController::class, 'index']);
    //weight投稿関連のルーティング
    Route::get('/weights', [weightPostController::class, 'index'])->name('Weight.index');
    //weight投稿保存のルーティング
    Route::post('/weights', [weightPostController::class, 'store']);
    //weight投稿作成画面を表示するルーティング
    Route::get('/weight/create', [weightPostController::class, 'create'])->name('Weight.create');
    //weight投稿の詳細画面を表示するルーティング
    Route::get('/weights/{weight}', [weightPostController::class, 'show'])->name('Weight.show');
    //weight投稿の削除を行うルーティング
    Route::delete('/Weight/{weight}', [weightPostController::class,'destroy']);
});

require __DIR__.'/auth.php';
