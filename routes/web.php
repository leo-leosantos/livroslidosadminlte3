<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    EditoraController,
    AuthorController,
    BookController,
    PhraseController
};
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
    return view('welcome');
});


Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

        // Editora
        Route::resource('/editora', EditoraController::class);

        // Author

        Route::resource('/author', AuthorController::class);

         // Books

         Route::resource('/book', BookController::class);
         Route::resource('/phrase', PhraseController::class);

    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
