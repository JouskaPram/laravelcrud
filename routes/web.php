<?php

use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// route group pelajaran
Route::controller(PelajaranController::class)->group(function(){
    Route::get('/pelajaran',"GetPelajaran");
    Route::get('/pelajaran/{p}',"singlePelajaran");
    Route::post("/pelajaran/store","storepostpelajaran");
    Route::put("/pelajaran/{p}","updatePelajaran")->name("pelajaran.update");
    Route::delete("/pelajaran/{id}","deletePelajaran")->name("pelajaran.delete");
});

//route group siswa
Route::controller(SiswaController::class)->group(function(){
    Route::get('/',"home");
    Route::get('/siswa/{p}',"singleSiswa");
    Route::put('/siswa/{p}',"updateSiswa")->name("siswa.update");
    Route::post("/store","storeSiswa");
    Route::delete("/siswa/{p}","deleteSiswa")->name("siswa.delete");

});


