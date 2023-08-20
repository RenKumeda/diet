<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mealPostController;
use App\Http\Controllers\trainingPostController;
use App\Http\Controllers\sleepPostController;
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
    //meal投稿関連のルーティング
    Route::get('/meals', [mealPostController::class, 'index'])->name('meal.index');
    //meal投稿の詳細画面を表示するルーティング
    Route::get('/meals/{meal}', [mealPostController::class, 'show'])->name('meal.show');
    //training投稿関連のルーティング
    Route::get('/trainings', [trainingPostController::class, 'index'])->name('training.index');
    //training投稿の詳細画面を表示するルーティング
    Route::get('/trainings/{training}', [trainingPostController::class, 'show'])->name('training.show');
    //sleep投稿関連のルーティング
    Route::get('/sleeps', [sleepPostController::class, 'index'])->name('sleep.index');
    //sleep投稿の詳細画面を表示するルーティング
    Route::get('/sleeps/{sleep}', [sleepPostController::class, 'show'])->name('sleep.show');
    //weight投稿関連のルーティング
    Route::get('/weights', [weightPostController::class, 'index'])->name('weight.index');
    //weight投稿の詳細画面を表示するルーティング
    Route::get('/weights/{weight}', [weightPostController::class, 'show'])->name('weight.show');
});

require __DIR__.'/auth.php';
