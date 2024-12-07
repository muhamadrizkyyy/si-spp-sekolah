<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $table = "siswa";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', "id");
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', "id");
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'thn_ajaran', "thn_ajaran");
    }
}
