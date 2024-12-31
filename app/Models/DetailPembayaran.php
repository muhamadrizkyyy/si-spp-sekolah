<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;

    public $table = "detail_pembayaran";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, "pembayaran_id", "id");
    }
}
