<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ["nama","kelas","nomor_absen","pelajaran_id"];
    public function pelajaran()
    {
        return $this->belongsTo(pelajaran::class);
    }
}
