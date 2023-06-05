<?php

use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// route pelajaran
Route::get('/pelajaran',[PelajaranController::class,"GetPelajaran"]);
Route::get('/pelajaran/{p}',[PelajaranController::class,"singlePelajaran"]);
Route::put("/pelajaran/{p}",[PelajaranController::class,"updatePelajaran"])->name("pelajaran.update");
// Route::get("/tambah",[PelajaranController::class,"PostPelajaran"]);
Route::post("/pelajaran/store",[PelajaranController::class,"storepostpelajaran"]);
Route::delete("/pelajaran/{id}",[PelajaranController::class,"deletePelajaran"])->name("pelajaran.delete");


Route::get('/',[SiswaController::class,"home"]);
