<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ["nama","kelas","nomor_absen","pelajaran_id","created_by"];
    public function pelajaran()
    {
        return $this->belongsTo(pelajaran::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
