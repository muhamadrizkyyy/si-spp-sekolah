<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;

    public $table = "metode_pembayaran";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'metode_pembayaran', "kode_pembayaran");
    }
}
