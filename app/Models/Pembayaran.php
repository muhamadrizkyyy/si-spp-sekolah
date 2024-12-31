<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    public $table = "pembayaran";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function siswaBayar()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detail_pembayaran()
    {
        return $this->hasMany(DetailPembayaran::class, 'pembayaran_id', "id");
    }

    public function metodePembayaran()
    {
        return $this->hasOne(MetodePembayaran::class, 'kode_pembayaran', 'metode_pembayaran');
    }
}
