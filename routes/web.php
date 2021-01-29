<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Screencast\TagController;
use App\Http\Controllers\Screencast\PlaylistController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('playlists')->middleware('permission:create playlists')->group(function () {
        Route::get('create', [PlaylistController::class, 'create'])->name('playlists.create');
        Route::post('create', [PlaylistController::class, 'store']);
        Route::get('table', [PlaylistController::class, 'table'])->name('playlists.table');
        Route::get('{playlist:slug}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
        Route::put('{playlist:slug}/edit', [PlaylistController::class, 'update']);
        Route::delete('{playlist:slug}', [PlaylistController::class, 'destroy'])->name('playlists.delete');

    });

    Route::prefix('tags')->group(function () {
        Route::middleware('permission:create tags')->group(function() {
            Route::get('table', [TagController::class, 'table'])->name('tags.table');
            Route::get('create', [TagController::class, 'create'])->name('tags.create');
            Route::post('create', [TagController::class, 'store']);
        });

        Route::middleware('permission:delete tags,edit tags')->group(function() {
            Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('tags.edit');
            Route::put('{tag:slug}/edit', [TagController::class, 'update']);
            Route::delete('{tag:slug}', [TagController::class, 'destroy'])->name('tags.delete')->middleware('permission:delete tag');
        });

    });
});

require __DIR__ . '/auth.php';
