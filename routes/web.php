<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\followPostController;
use App\Http\Controllers\commentPostController;
use App\Http\Controllers\likePostController;
use App\Http\Controllers\mealPostController;
use App\Http\Controllers\postPostController;
use App\Http\Controllers\sleepPostController;
use App\Http\Controllers\trainingPostController;
use App\Http\Controllers\userPostController;
use App\Http\Controllers\weightLogController;
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

    //chartjsに関するルーティング
    Route::get('/chartjs', function () {
        return view('chartjs');
    });
    
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
    Route::post('/like', [likePostController::class, 'like']);
    
    //meal投稿関連のルーティング
    Route::controller(mealPostController::class)->middleware(['auth'])->group(function(){
        Route::get('/meals', 'index')->name('Meal.index');
        Route::post('/meals', 'store');
        Route::get('/meal/create', 'create')->name('Meal.create');
        Route::get('/meals/{meal}', 'show')->name('Meal.show');
        Route::delete('/Meal/{meal}', 'destroy');
    });

    //post投稿関連のルーティング
    Route::controller(postPostController::class)->middleware(['auth'])->group(function(){
        Route::get('/posts', 'index')->name('Post.index');
        Route::post('/posts', 'store');
        Route::get('/post/create', 'create')->name('Post.create');
        Route::get('/posts/{post}', 'show')->name('Post.show');
        Route::delete('/Post/{post}', 'destroy');
    });
   
    //sleep投稿関連のルーティング
    Route::controller(weightPostController::class)->middleware(['auth'])->group(function(){
        Route::get('/sleeps', 'index')->name('Sleep.index');
        Route::post('/sleeps', 'store');
        Route::get('/sleep/create', 'create')->name('Sleep.create');
        Route::get('/sleeps/{sleep}', 'show')->name('Sleep.show');
        Route::delete('/Sleep/{sleep}','destroy');
    });

    //training投稿関連のルーティング
    Route::controller(trainingPostController::class)->middleware(['auth'])->group(function(){
        Route::get('/trainings', 'index')->name('Training.index');
        Route::post('/trainings', 'store');
        Route::get('/training/create', 'create')->name('Training.create');
        Route::get('/trainings/{training}', 'show')->name('Training.show');
        Route::delete('/Training/{training}', 'destroy');
    });

    //userの一覧ページを表示するルーティング
    Route::get('/users', [userPostController::class, 'index']);

    //weight投稿関連のルーティング
    Route::controller(weightPostController::class)->middleware(['auth'])->group(function(){
        Route::get('/weights', 'index')->name('Weight.index');
        Route::post('/weights', 'store');
        Route::get('/weight/create', 'create')->name('Weight.create');
        Route::get('/weights/{weight}', 'show')->name('Weight.show');
        Route::delete('/Weight/{weight}', 'destroy');
    });
    
    //weight_logに関するルーティング
    Route::get('/log/', [weightLogController::class, "show"]);
});

require __DIR__.'/auth.php';
