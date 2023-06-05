<?php

use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// route pelajaran
Route::get('/pelajaran',[PelajaranController::class,"GetPelajaran"]);
Route::post("/pelajaran/tambah",[PelajaranController::class,"PostPelajaran"]);


Route::get('/',[SiswaController::class,"home"]);
