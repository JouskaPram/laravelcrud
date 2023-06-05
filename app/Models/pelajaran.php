<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelajaran extends Model
{
    use HasFactory;
    protected $fillable = ['nama_pelajaran'];
    public function SISWA()
    {
        return $this->hasMany(siswa::class,'pelajaran_id');
    }
}
