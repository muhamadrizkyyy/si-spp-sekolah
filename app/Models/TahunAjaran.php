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
}
