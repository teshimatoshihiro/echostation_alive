 <?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\BookController;
    use App\Http\Controllers\OfferController;
    use App\Http\Controllers\MatchesController;
    use Illuminate\Support\Facades\Route;
    // use Illuminate\Http\Request; //Add

    // 共通のミドルウェアの適用（ログインしているユーザーのみアクセス可）
    Route::middleware(['auth'])->group(function () {
        // トップページ
        //  Route::get('/', [BookController::class, 'index'])->name('book_index');

        // ダッシュボード
        Route::view('/dashboard', 'profile/partials/offer')->name('dashboard');

        // 依頼のメイン表示
        Route::get('/mainoffer', [OfferController::class, 'showMainOffer'])->name('mainoffer.show');

        // マッチングユーザーの一覧取得
         Route::get('/matches/{speciality}', [MatchesController::class, 'listBySpeciality'])->name('matches.listBySpeciality');

        // web.php
        // Route::get('/skyway/{user}', [MatchesController::class, 'showSkyway'])->name('skyway.show');
        // web.php
        Route::view('/skyway', 'skyway')->name('skyway.show');


          Route::get('/show-books', [BookController::class, 'showBooks'])->name('show_books');


        //心臓、上腹部、下腹部についてのユーザー検索アクション
        // Route::get('/matches/{speciality}', 'MatchesController@findBySpeciality');




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
    });

    // ログイン前のページ
    Route::view('/', 'welcome')->name('welcome');

    require __DIR__ . '/auth.php';
