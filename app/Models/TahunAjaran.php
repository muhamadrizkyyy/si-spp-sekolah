<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    public $table = "tahun_ajaran";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function tahun_ajaran_siswa()
    {
        return $this->hasMany(Siswa::class, 'thn_ajaran', 'thn_ajaran');
    }

    public function tahun_ajaran_bayar()
    {
        return $this->hasMany(Pembayaran::class, 'thn_ajaran', 'thn_ajaran');
    }
}
