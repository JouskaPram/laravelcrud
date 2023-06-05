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
    public function PostPelajaran()
    {
        return view("pelajaran.post");
    }
}
