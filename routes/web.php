<?php

use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// route pelajaran
Route::get('/pelajaran',[PelajaranController::class,"GetPelajaran"]);
Route::post("/pelajaran/store",[PelajaranController::class,"storepostpelajaran"]);
Route::get('/pelajaran/{p}',[PelajaranController::class,"singlePelajaran"]);
Route::put("/pelajaran/{p}",[PelajaranController::class,"updatePelajaran"])->name("pelajaran.update");
// Route::get("/tambah",[PelajaranController::class,"PostPelajaran"]);
Route::delete("/pelajaran/{id}",[PelajaranController::class,"deletePelajaran"])->name("pelajaran.delete");

//route siswa
Route::get('/',[SiswaController::class,"home"]);
Route::get('/siswa/{p}',[SiswaController::class,"singleSiswa"]);
Route::put('/siswa/{p}',[SiswaController::class,"updateSiswa"])->name("siswa.update");
Route::post("/store",[SiswaController::class,"storeSiswa"]);
Route::delete("/siswa/{p}",[SiswaController::class,"deleteSiswa"])->name("siswa.delete");


