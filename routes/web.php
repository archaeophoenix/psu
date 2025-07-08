<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Beranda',
        'description' => 'Selamat datang di PSU',
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard',
        'description' => 'Selamat datang di PSU',
    ]);
});

Route::get('/pengaduan', function () {
    return view('proposal', [
        'title' => 'Pengaduan',
        'description' => 'Selamat datang di PSU',
    ]);
});
