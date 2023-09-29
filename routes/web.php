<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\DoctorController; // 追加
use Illuminate\Support\Facades\Route;

// 共通のミドルウェアの適用（ログインしているユーザーのみアクセス可）
Route::middleware(['auth'])->group(function () {

  // ダッシュボード
  Route::view('/dashboard', 'profile/partials/offer')->name('dashboard');

  // 依頼のメイン表示
  Route::get('/mainoffer', [OfferController::class, 'showMainOffer'])->name('mainoffer.show');

  // マッチングユーザーの一覧取得
  Route::get('/matches/{speciality}', [MatchesController::class, 'listBySpeciality'])->name('matches.listBySpeciality');

  // web.php
  Route::view('/skyway', 'skyway')->name('skyway.show');

  Route::get('/show-books', [BookController::class, 'showBooks'])->name('show_books');

  // 本に関する操作
  Route::post('/books', [BookController::class, "store"])->name('book_store');
  Route::delete('/book/{book}', [BookController::class, "destroy"])->name('book_destroy');
  Route::get('/booksedit/{book}', [BookController::class, "edit"])->name('edit');
  Route::post('/booksedit/{book}', [BookController::class, "edit"])->name('book_edit');
  Route::post('/books/update', [BookController::class, "update"])->name('book_update');

  // プロフィール編集
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  // Doctorに関する操作
  Route::get('/doctors', [DoctorController::class, "index"])->name('doctors.index');
  Route::get('/doctors/create', [DoctorController::class, "create"])->name('doctors.create');
  Route::post('/doctors', [DoctorController::class, "store"])->name('doctors.store');
  Route::get('/doctors/{doctor}', [DoctorController::class, "show"])->name('doctors.show');
  Route::get('/doctors/{doctor}/edit', [DoctorController::class, "edit"])->name('doctors.edit');
  Route::patch('/doctors/{doctor}', [DoctorController::class, "update"])->name('doctors.update');
  Route::delete('/doctors/{doctor}', [DoctorController::class, "destroy"])->name('doctors.destroy');
});

// ログイン前のページ
Route::view('/', 'welcome')->name('welcome');

require __DIR__ . '/auth.php';
