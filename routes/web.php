<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('Login');
});
Route::get('/daftar', function () {
    return view('Daftar');
});
Route::get('/produkpemilik', function () {
    return view('ProdukPemilik');
});
Route::get('/pesananpemilik', function () {
    return view('PesananPemilik');
});
Route::get('/laporankeuanganpemilik', function () {
    return view('LaporankeuanganPemilik');
});

    