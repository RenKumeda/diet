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
    Route::get('/meals', [mealPostController::class, 'index'])->name('Meal.index');
    //meal投稿保存のルーティング
    Route::post('/meals', [mealPostController::class, 'store'])->name('Meal.store');
    //meal投稿作成画面を表示するルーティング
    Route::get('/meal/create', [mealPostController::class, 'create']);
    //meal投稿の詳細画面を表示するルーティング
    Route::get('/Meal/{meal}', [mealPostController::class, 'show'])->name('Meal.show');
    //training投稿関連のルーティング
    Route::get('/trainings', [trainingPostController::class, 'index'])->name('Training.index');
    //ttraining投稿作成画面を表示するルーティング
    Route::get('/Training/create', [trainingPostController::class, 'create'])->name('Training.create');
    //training投稿の詳細画面を表示するルーティング
    Route::get('/Training/{training}', [trainingPostController::class, 'show'])->name('Training.show');
    //sleep投稿関連のルーティング
    Route::get('/sleeps', [sleepPostController::class, 'index'])->name('Sleep.index');
    //sleep投稿作成画面を表示するルーティング
    Route::get('/Sleep/create', [sleepPostController::class, 'create'])->name('Sleep.create');
    //sleep投稿の詳細画面を表示するルーティング
    Route::get('/Sleep/{sleep}', [sleepPostController::class, 'show'])->name('Sleep.show');
    //weight投稿関連のルーティング
    Route::get('/weights', [weightPostController::class, 'index'])->name('Weight.index');
    //weight投稿作成画面を表示するルーティング
    Route::get('/Weight/create', [weightPostController::class, 'create'])->name('Weight.create');
    //weight投稿の詳細画面を表示するルーティング
    Route::get('/Weight/{weight}', [weightPostController::class, 'show'])->name('Weight.show');
});

require __DIR__.'/auth.php';
