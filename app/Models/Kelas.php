<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public $table = "kelas";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function anggota_kelas()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }
}
