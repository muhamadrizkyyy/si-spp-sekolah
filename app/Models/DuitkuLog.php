<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuitkuLog extends Model
{
    use HasFactory;

    public $table = "duitku_logs";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function duitkuLogs()
    {
        return $this->belongsTo(Pembayaran::class, "no_pembayaran", "no_pembayaran");
    }
}
