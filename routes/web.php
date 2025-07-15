<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articles;
use Illuminate\Support\Facades\View;

Route::resource('/', \App\Http\Controllers\HomeController::class);

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard',
        'description' => 'Selamat datang di Dashboard PSU',
    ]);
});

Route::get('/pengaduan', function () {
    return view('road', [
        'title' => 'Pengaduan',
        'description' => 'Selamat datang di Pengaduan PSU',
    ]);
});

Route::get('/form-pengaduan', function () {
    return view('proposal', [
        'title' => 'Form Pengaduan',
        'description' => 'Selamat datang di Form Pengaduan PSU',
    ]);
});

Route::get('/peta', function () {
    return view('map', [
        'title' => 'Peta',
        'description' => 'Selamat datang di Peta PSU',
    ]);
});

Route::get('/artikel', function () {
    return view('articles', [
        'title' => 'Artikel',
        'description' => 'Selamat datang di Artikel PSU',
        'articles' => Articles::all()
    ]);
});

Route::get('/mappings-data', [\App\Http\Controllers\MappingController::class, 'mappingsData']);
Route::get('/mappings-map', [\App\Http\Controllers\MappingController::class, 'getAllMapping']);

Route::get('/artikel/{article:slug}', function (Articles $article) {
    return response()->json(['data' => $article,'message' => 'Data retrieved successfully']);
});

Route::get('/chart-data', [\App\Http\Controllers\ChartController::class, 'chartData']);

Route::get('/form-artikel', function () {
    return view('article', [
        'title' => 'Form Artikel',
        'description' => 'Selamat datang di Form Artikel PSU',
    ]);
});

Route::get('/pengguna', function () {
    return view('users', [
        'title' => 'Pengguna',
        'description' => 'Selamat datang di Pengguna PSU',
    ]);
});
