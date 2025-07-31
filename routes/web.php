<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articles;
use App\Http\Controllers\AuthController;
use \App\Http\Middleware\RoleMiddleware;

Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::resource('/peta', \App\Http\Controllers\MapController::class)->middleware(RoleMiddleware::class.':superadmin,admin');

Route::get('/chart-data', [\App\Http\Controllers\ChartController::class, 'chartData'])->name('chart.data');
Route::get('/village-data', [\App\Http\Controllers\VillageController::class, 'villagetData'])->name('village.data');

Route::controller(\App\Http\Controllers\DatasController::class)->group(function () {
    Route::get('/mappings-data', 'getAllMapping')->name('mappings.data');
    Route::get('/mappings-map', 'getAllMapping')->name('mappings.map');
    Route::get('/articles-data', 'getArticles')->name('articles.data');
});

Route::controller(\App\Http\Controllers\ProposalController::class)->group(function () {
    Route::get('/pengaduan', 'index')->name('proposal.index')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::get('/pengaduan/create', 'create')->name('proposal.create')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::post('/pengaduan', 'store')->name('proposal.store')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::put('/pengaduan/action/{id}', 'approve')->name('proposal.approve')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::get('/pengaduan/action/{id}', 'action')->name('proposal.action')->middleware(RoleMiddleware::class.':superadmin,admin');
});

Route::get('/artikel/{article:slug}', function (Articles $article) {
    return response()->json(['data' => $article,'message' => 'Data retrieved successfully']);
});

Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware(RoleMiddleware::class.':superadmin,admin');
});

Route::controller(\App\Http\Controllers\ArticleController::class)->group(function () {
    Route::get('/artikel', 'index')->name('article.index')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::get('/artikel/create', 'create')->name('article.create')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::post('/artikel', 'store')->name('article.store')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::get('/artikel/{id}', 'edit')->name('article.edit')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::put('/artikel/{id}', 'update')->name('article.update')->middleware(RoleMiddleware::class.':superadmin,admin');
    Route::delete('/artikel/{id}', 'destroy')->name('article.destroy')->middleware(RoleMiddleware::class.':superadmin,admin');
});

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/pengguna', 'index')->name('user.index')->middleware(RoleMiddleware::class.':superadmin');
    Route::get('/pengguna/create', 'create')->name('user.create')->middleware(RoleMiddleware::class.':superadmin');
    Route::post('/pengguna', 'store')->name('user.store')->middleware(RoleMiddleware::class.':superadmin');
    Route::get('/pengguna/{id}', 'edit')->name('user.edit')->middleware(RoleMiddleware::class.':superadmin');
    Route::put('/pengguna/{id}', 'update')->name('user.update')->middleware(RoleMiddleware::class.':superadmin');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
