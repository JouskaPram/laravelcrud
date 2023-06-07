<?php

use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::middleware('auth')->group(function(){
Route::controller(PelajaranController::class)->group(function(){
        Route::get('/pelajaran',"GetPelajaran")->name('dashboard');
        Route::get('/pelajaran/{p}',"singlePelajaran");
        Route::post("/pelajaran/store","storepostpelajaran");
        Route::put("/pelajaran/{p}","updatePelajaran")->name("pelajaran.update");
        Route::delete("/pelajaran/{id}","deletePelajaran")->name("pelajaran.delete");
        Route::get("/pel/cari","searchPelajaran")->name('pelajaran.search');
    });
// });

//route group siswa
Route::controller(SiswaController::class)->group(function(){
    Route::get('/',"home")->name('home');;
    Route::delete("/siswa/{p}","deleteSiswa")->name("siswa.delete");
    Route::post("/store","storeSiswa");
Route::middleware('auth')->group(function(){
    Route::get('/siswa/{p}',"singleSiswa");
    Route::put('/siswa/{p}',"updateSiswa")->name("siswa.update");
    Route::get('/sis/cari',"searchSiswa")->name("siswa.search");

});
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
