<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articles;
use App\Http\Controllers\AuthController;

Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::resource('/peta', \App\Http\Controllers\MapController::class);

Route::get('/chart-data', [\App\Http\Controllers\ChartController::class, 'chartData']);
Route::get('/village-data', [\App\Http\Controllers\VillageController::class, 'villagetData']);

Route::controller(\App\Http\Controllers\DatasController::class)->group(function () {
    Route::get('/mappings-data', 'mappingsData');
    Route::get('/mappings-map', 'getAllMapping');
    Route::get('/articles-data', 'getArticles');
});

Route::controller(\App\Http\Controllers\ProposalController::class)->group(function () {
    Route::get('/pengaduan', 'create');
    Route::get('/form-pengaduan', 'index');
    Route::post('/pengaduan', 'store');
});

Route::controller(\App\Http\Controllers\ArticleController::class)->group(function () {
    Route::get('/artikel', 'index');
    // Route::post('/artikel', 'store');
});

Route::get('/artikel/{article:slug}', function (Articles $article) {
    return response()->json(['data' => $article,'message' => 'Data retrieved successfully']);
});

Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index');
});

// Route::get('/pengguna', function () {
//     return view('users', [
//         'title' => 'Pengguna',
//         'description' => 'Selamat datang di Pengguna PSU',
//     ]);
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
