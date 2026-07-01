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
Route::get('/penggunapemilik', function () {
    return view('Penggunapemilik');
});
Route::get('/pengaturantokopemilik', function () {
    return view('Pengaturantokopemilik');
});
Route::get('/produkadmin', function () {
    return view('ProdukAdmin');
});
Route::get('/pesananadmin', function () {
    return view('PesananAdmin');
});
Route::get('/laporankeuanganadmin', function () {
    return view('LaporankeuanganAdmin');
});
Route::get('/produkpelanggan', function () {
    return view('ProdukPelanggan');
});
Route::get('/keranjangpelanggan', function () {
    return view('KeranjangPelanggan');
});
    