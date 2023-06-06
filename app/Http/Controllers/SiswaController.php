<?php

namespace App\Http\Controllers;

use App\Models\pelajaran;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function home()
    {
    //    $siswa = DB::table("siswas")
    //    ->join("pelajarans","siswas.pelajaran_id",'=','pelajarans.id')
    //    ->select("siswas.*","pelajarans.nama_pelajaran")
    //    ->first();
    $siswa = siswa::orderBy("id","DESC")->get();
    $pelajaran = pelajaran::all();
       return view("siswa.home",compact(["siswa","pelajaran"]));
    }
  public function storeSiswa(Request $request)
{
   $request->validate([
    "nama" => "required|string",
    "kelas" => "required|string",
    "nomor_absen" => "nullable|max:255",
    "pelajaran_id" => "required",
   ]);

   $siswa = new siswa;
   $siswa->nama = $request->nama;
   $siswa->kelas = $request->kelas;
   $siswa->nomor_absen = $request->nomor_absen;
   $siswa->pelajaran_id = $request->pelajaran_id;
   $siswa->save();

   return redirect("/")->with('sukses', "Siswa berhasil ditambahkan");
}
    public function singleSiswa($p)
    {
        $pelajaran = pelajaran::all();
        $siswa = siswa::find($p);
        return view("siswa.single",["siswa"=>$siswa,"pelajaran"=>$pelajaran]);

    }
    public function updateSiswa(Request $request,$p)
    {
        $request->validate([
    "nama" => "string",
    "kelas" => "string",
    "nomor_absen" => "max:255",
    "pelajaran_id" => "required",
   ]);

   $siswa = siswa::find($p);
   $siswa->nama = $request->nama;
   $siswa->kelas = $request->kelas;
   $siswa->nomor_absen = $request->nomor_absen;
   $siswa->pelajaran_id = $request->pelajaran_id;
   $siswa->save();

   return redirect("/")->with('sukses', "Siswa berhasil di ubah");
    }
    public function deleteSiswa($p)
    {
        $siswa = siswa::find($p);
        $siswa->delete();
        return redirect("/")->with('danger', "Siswa berhasil di hapus");
    }
    public function searchSiswa(Request $request)
    {
        $pelajaran = pelajaran::all();
        $keyword = $request->input("keyword");
        $siswa = siswa::where("nama","like","%".$keyword."%")
                        ->orWhere("kelas","like","%".$keyword."%")
                        ->orWhere("nomor_absen","like","%".$keyword."%")
                        ->orWhere("pelajaran_id","like","%".$keyword."%")
                        ->get();

            if($siswa->isEmpty()){
                return redirect()->back()->with("none","$keyword tidak ada sir");
            }
        
        return view("siswa.home",compact(["siswa","pelajaran"]));
    }
}
