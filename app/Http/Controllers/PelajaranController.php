<?php

namespace App\Http\Controllers;

use App\Models\pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function GetPelajaran()
    {
        $pelajaran =  pelajaran::all();
        return view("pelajaran.view",["pelajaran"=>$pelajaran]);
    }
    // public function PostPelajaran()
    // {
    //     return view("pelajaran.post");
    // }
    public function storepostpelajaran(Request $request)
    {
       $pelajaran = new pelajaran;
       $pelajaran->nama_pelajaran = $request->pelajaran;
       $pelajaran->save();
       return redirect("/pelajaran")->with('status',"mata pelajaran berhasil di tambahkan");
       
    }
    public function deletePelajaran($id)
    {
        $pelajaran = pelajaran::find($id);
        $pelajaran->delete();
        return redirect("/pelajaran");
    }
    public function singlePelajaran($p)
    {
        $pelajaran = pelajaran::find($p);
        return view("pelajaran.single",['pelajaran'=>$pelajaran]);
    }
    public function updatePelajaran(Request $request,$p)
    {
        $pelajaran = pelajaran::find($p);
        $pelajaran->nama_pelajaran = $request->namapelajaran;
        $pelajaran->save();

        return redirect("pelajaran");

    }
}
