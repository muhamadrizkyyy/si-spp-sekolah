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
}
