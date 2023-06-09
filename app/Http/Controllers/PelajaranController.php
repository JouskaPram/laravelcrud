<?php

namespace App\Http\Controllers;

use App\Models\pelajaran;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajaranController extends Controller
{
    public function GetPelajaran()
    {
        $this->authorize("admin");
        $user = Auth::user();
        $pelajaran =  pelajaran::orderBy('id', 'DESC')->get();
     

            return view("pelajaran.view",["pelajaran"=>$pelajaran,"user"=>$user]);
        
       
        
    }
  
    // function untuk proses create
    public function storepostpelajaran(Request $request)
    {  
    $request->validate([
        "pelajaran"=>"required|string|max:255"
    ]);
       $pelajaran = new pelajaran;
       $pelajaran->nama_pelajaran = $request->pelajaran;
       $pelajaran->save();
       return redirect("/pelajaran")->with('sukses',"matapelajaran berhasil di tambahkan");
       
    }
    public function deletePelajaran($id)
    {
        $pelajaran = pelajaran::find($id);
        $pelajaran->delete();
        return redirect("/pelajaran")->with('danger',"matapelajaran berhasil di hapus");
    }
    public function singlePelajaran($p)
    {
         $user = Auth::user();
        $pelajaran = pelajaran::find($p);
        return view("pelajaran.single",['pelajaran'=>$pelajaran,"user"=>$user]);
    }
    public function updatePelajaran(Request $request,$p)
    {
        
        $pelajaran = pelajaran::find($p);
        $pelajaran->nama_pelajaran = $request->namapelajaran;
        $pelajaran->save();

        return redirect("pelajaran")->with('sukses',"matapelajaran berhasil di ubah");

    }
    public function searchPelajaran(Request $request)
    {
         $user = Auth::user();
        $keyword = $request->input('keyword');
        $pelajaran = pelajaran::where("nama_pelajaran","like",'%'.$keyword.'%')
        ->get();
        // validasi jika tidak ada apa apa
         if($pelajaran->isEmpty()){
                return redirect()->back()->with("none","gak ada nama pelajar -> $keyword ");
            }
     return view("pelajaran.view",compact("pelajaran","user"));
    }
    public function FilterPelajaran($p)  {
        $siswa = pelajaran::find($p)->siswa;
        
        $pelajaran = pelajaran::find($p);
$user = Auth::user();
        return view("pelajaran.filter",["siswa"=>$siswa,"pelajaran"=>$pelajaran,"user"=>$user]);
    }
}
